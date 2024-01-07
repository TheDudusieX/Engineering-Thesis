<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\JuryMail;
use Carbon\CarbonPeriod;
use App\Models\Orchestra;
use App\Models\Timetable;
use Illuminate\Support\Str;
use App\Models\JuryInReview;
use Illuminate\Http\Request;
use App\Models\TimetablePivot;
use App\Models\OrchesterReview;
use App\Models\OrchestraInReview;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewAcceptNotification;
use App\Mail\ReviewRejectNotification;
use Illuminate\Support\Facades\Validator;

class MyReviewsController extends Controller
{
    public function index() {
    // $orchestra = OrchesterReview::get();
    // foreach($orchestra as $orchestra){
    //     $myReviews = collect($orchestra->whereRelation('getOrganizer','agent_id', '=', Auth::user()->id)->get());
    // }
    $a = Auth::user()->id;
    $myReviews = OrchesterReview::whereHas('getOrganizer', function ($query) use ($a){
        $query->where([['agent_id', $a], ['status_id', 1]]);
    })->paginate(1);
    if(isset($myReviews))
    return view('myReviews', compact('myReviews'));
    else
    return view('myReviews');
    }

    public function accept($id, $reviewId) {
        $member = OrchestraInReview::where([['orchestra_id', $id],['review_id', $reviewId]])->first();
        $member->status_id = 1;
        $member->save();
        $counter = OrchestraInReview::where([['status_id', 1], ['review_id', $reviewId]])->select('review_id', DB::raw('count(*) as counter'))->groupBy('review_id')->first();
            $counter->review->update([
            'current_number_of_orchestras' => $counter->counter,
            ]);
            Mail::to($member->orchestra->user->email)->send(new ReviewAcceptNotification($member->review->name, $member->review->organizer));
            return redirect()->route('myReviews')
            ->with('success', __('translation.myReview.accepted_Orchestra'));
    }

    public function deny($id, $reviewId) {
        $member = OrchestraInReview::where([['orchestra_id', $id],['review_id', $reviewId]])->first();
        $member->status_id = 3;
        $member->save();
        Mail::to($member->orchestra->user->email)->send(new ReviewRejectNotification($member->review->name, $member->review->organizer));
        return redirect()->route('myReviews')
        ->with('success', __('translation.myReview.rejected_Orchestra'));
    }

    public function timeTable(OrchesterReview $orchesterreview) {
        $timetable = Timetable::where('review_id', $orchesterreview->id)->first();
        $members = OrchestraInReview::where([['review_id', $timetable->review_id],['status_id', 1]])->get();
        $startTime = OrchesterReview::where('id', $timetable->review_id)->first()->start_time;
        $times = $this->test($startTime);
        return view('timeTable', compact('timetable', 'members', 'times'));
    }

    public function test($start) {
        $startTime = new DateTime(date('H:i:s', strtotime($start)));
        $endTime = new DateTime(date('H:i:s', strtotime('+8 hours', strtotime($start))));
        $period = new DatePeriod($startTime, DateInterval::createFromDateString('30 minutes'), $endTime);
        $TimeTable = [];
        foreach($period as $time) {
            $TimeTable[] = $time->format('H:i:s');
        }
        return $TimeTable;
    }

    public function timeTableStore($id) {
        Timetable::create([
            'review_id' => $id,
            'organizer_id' => auth()->user()->id,
        ]);
        return redirect()->route('timeTable', ['orchesterreview' => $id]);
    }

    public function timeTablePivotStore(Request $request) {
        $validated = $request->validate([
            'time.*.value' => 'required|distinct',
        ]);
        if(!isset($request->time)) {
            return redirect()->route('myReviews')
            ->with('success', __('Nie ustalono harmonogramu'));
        }
        $tab = $request->time;
        $tabTime = $this->test($request->startTime);

        foreach($tab as $key => $member){
            TimetablePivot::create([
                'orchestra_id' => OrchestraInReview::where('id', $member['value'])->first()->orchestra->id,
                'performance_time' => $tabTime[$key],
                'timetable_id' => $request->timetableid,
                'status_id' => 2
            ]);
        }
        return redirect()->route('myReviews')
        ->with('success', __('Dodano harmonogram'));

    }

    public function timeTablePivotEdit($id) {
        $timetable = Timetable::where('id', $id)->first();
        $startTime = OrchesterReview::where('id', $timetable->review_id)->first()->start_time;
        $timetablepivot = TimetablePivot::where('timetable_id', $timetable->id)->get();
        $members = OrchestraInReview::where([['review_id', $timetable->review_id],['status_id', 1]])->get();
        $times = $this->test($startTime);
        return view('timeTableUpdate', compact('timetablepivot', 'timetable', 'times', 'members'));
    }

    public function timeTablePivotUpdate(Request $request) {
        
        $validated = $request->validate([
            'time.*.value' => 'required|distinct',
        ]);
        if(!isset($request->time)) {
            return redirect()->route('myReviews')
            ->with('success', __('Nie zaktualizowano harmonogramu'));
        }
        $tab = $request->time;
        $tabTime = $this->test($request->startTime);

        foreach($tab as $key => $member)
            if(TimetablePivot::where('orchestra_id', OrchestraInReview::where('id', $member['value'])->first()->orchestra->id)->count() > 0){
                TimetablePivot::where('orchestra_id', OrchestraInReview::where('id', $member['value'])->first()->orchestra->id)
                        ->update([
                    'performance_time' => $tabTime[$key],
                ]);
            }
        else {
            TimetablePivot::create([
                'orchestra_id' => OrchestraInReview::where('id', $member['value'])->first()->orchestra->id,
                'performance_time' => $tabTime[$key],
                'timetable_id' => $request->timetableid,
                'status_id' => 2
            ]);
        }
        return redirect()->route('myReviews')
        ->with('success', __('Zapisano zmiany'));
    }

    public function resetOrchestra($id, $orchestraId) {
        $timetable = Timetable::where('id', $id)->first();
        $startTime = OrchesterReview::where('id', $timetable->review_id)->first()->start_time;
        $timetablepivot = TimetablePivot::where('timetable_id', $timetable->id)->get();
        $members = OrchestraInReview::where([['review_id', $timetable->review_id],['status_id', 1]])->get();
        $times = $this->test($startTime);
        TimetablePivot::where('orchestra_id', $orchestraId)->delete();
        return view('timeTableUpdate', compact('timetablepivot', 'timetable', 'times', 'members'));
        
    }

    public function juryUserAdd(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone'=> ['required', 'integer'],
            'email' => ['required', 'string', 'max:255'],
        ]);
        $password = Str::random(10);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($password),  
        ]);
        if(!Role::where('name', 'jury')->exists()) {
            $role = Role::create(['name' => 'jury']);
            if(isset($role))
            $user->assignRole($role);
        }
        else {
            $role = Role::findByName('jury');
            if(isset($role))
            $user->assignRole($role);
        }
        Mail::to($request->email)->send(new JuryMail($request->email, $password));
        return redirect()->route('juryindex', ['id' => $request->redirect])
        ->with('success', __('Dodano jury'));
    }

    public function juryindex(OrchesterReview $id) {
        if(Role::where('name', 'jury')->exists()) {
            $users = User::role('jury')->get();
            return view('juryAdd', compact('id', 'users'));
        }
        else {
            $users = [];
            return view('juryAdd', compact('id', 'users'));
        }
    }

    public function juryadd(Request $request) {
        $validated = $request->validate([
            'jury.*.value' => 'required|distinct',
        ]);

        foreach($request->jury as $jur)
        JuryInReview::create([
            'jury_id' => $jur['value'],
            'orchester_reviews_id' => $request->orchester_reviews_id,
        ]);
        return redirect()->route('myReviews')
        ->with('success', __('Powołano jury'));
    }

    public function juryEditIndex(OrchesterReview $id)
    {
        $users = User::role('jury')->get();
        $jury = JuryInReview::where('orchester_reviews_id', $id->id)
        ->whereHas('getUser', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'jury');
            });
        })
        ->with('getUser', 'review', 'juryRating')
        ->get();
        return view('juryEdit', compact('jury', 'id', 'users'));
    }

    public function juryEdit(Request $request) {
        $validated = $request->validate([
            'jury.*.value' => 'required|distinct',
        ]);

    JuryInReview::where('orchester_reviews_id', $request->orchester_reviews_id)->delete();

    foreach($request->jury as $jur) {
        JuryInReview::create([
            'jury_id' => $jur['value'],
            'orchester_reviews_id' => $request->orchester_reviews_id,
        ]);
    }

    return redirect()->route('myReviews')
        ->with('success', __('translation.myReview.juryUpdated'));
    }

    public function acceptPerfomanceIndex(OrchesterReview $orchesterreview) {
        $review = Timetable::where('review_id', $orchesterreview->id)->first();
        if($review !== null) {
            $participants = $review->getOrchestraTimes;
            if($participants->count() == 0) {
                return redirect()->route('myReviews')
                ->with('warning', __('Nie można zatwierdzić występów'));
            }
            return view('acceptPerformanceIndex', compact('participants'));
        }
        else
            return redirect()->route('myReviews')
            ->with('danger', __('Nie można zatwierdzić występów (brak harmonogramu)'));
        }

    public function acceptPerformance(Request $request) {
        if(isset($request->status)){
            TimetablePivot::whereIn('orchestra_id', array_keys($request->status))
                ->update([
                    'status_id' => 1,
            ]);
            return redirect()->route('myReviews')
            ->with('success', __('Zatwierdzono występy'));
        }
        return redirect()->route('myReviews')
        ->with('danger', __('Nie wprowadzono zmian'));
    }

    public function finishReview(OrchesterReview $review) {
        $review->status_id = 3;
        $review->save();

        return redirect()->route('myReviews')
        ->with('success', __('Zakończono przegląd'));
    }
}
