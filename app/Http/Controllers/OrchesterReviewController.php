<?php

namespace App\Http\Controllers;

use App\Models\Orchestra;
use App\Models\Timetable;
use App\Models\JuryInReview;
use Illuminate\Http\Request;
use App\Models\OrchesterReview;
use App\Models\OrchestraInReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\OrchesterReviewAddRequest;

class OrchesterReviewController extends Controller
{
    public function index()
    {
        $review = OrchesterReview::where('status_id',1)->latest()->paginate(6);
        return view('orchesterreview', compact('review'));
    }

    public function indexcanceled()
    {
        $review = OrchesterReview::where('status_id',2)->latest()->paginate(6);
        return view('orchesterreviewCanceled', compact('review'));
    }

    public function indexended()
    {
        $review = OrchesterReview::where('status_id',3)->latest()->paginate(6);
        return view('orchesterreviewEnded', compact('review'));
    }

    public function indexPreview($id)
    {
        $organizer = Orchestra::where('id', $id)->first();
        return view('orchesterPreview', compact('organizer'));
    }

    public function add()
    {
        return view('orchesterreviewAdd');
    }

    public function store(OrchesterReviewAddRequest $request)
    {
        $input = $request->all();
        $orchestra = Auth::user();
        $input['current_number_of_orchestras'] = 0;
        $input['status_id'] = 1;
        $input['organizer'] = $orchestra->getOrchestra?->orchestraname;
        OrchesterReview::create($input);

        return redirect()->route('myReviews')
            ->with('success', __('translation.toast.successAdd'));
    }

    public function edit($id)
    {
        $review = OrchesterReview::where('id',$id)->first();
        return view('orchesterreviewEdit', compact('review'));
    }

    public function update(OrchesterReviewAddRequest $request, $id)
    {
        $review = OrchesterReview::where('id',$id)->first();
        $review->update($request->all());
        return redirect()->route('myReviews')
        ->with('success', __('translation.toast.success'));
    }

    public function destroy($id)
    {
        $review = OrchesterReview::where('id',$id)->first();
        $review->update([
            'status_id' => 2
        ]);
        return redirect()->route('myReviews')
        ->with('success', __('translation.toast.success'));
    }

    public function signUp($id)
    {
        if ($id) {
            if (OrchestraInReview::where([['orchestra_id', Auth::user()->getOrchestra->id], ['review_id', $id]])->exists()) {
                return redirect()->route('orchesterreview')
                    ->with('danger', __('translation.toast.dangerReview'));
            } else {
                $table['orchestra_id'] = Auth::user()->getOrchestra->id;
                $table['review_id'] = $id;
                $table['status_id'] = 2;
                OrchestraInReview::create($table);
                return redirect()->route('orchesterreview')
                    ->with('success', __('translation.toast.successReview'));
            }
        }
    }

    public function signOut($id)
    {
        $orchestra = OrchestraInReview::where([['status_id', 2],['orchestra_id', Auth::user()->getOrchestra->id],['review_id', $id]]);
        if($orchestra->exists()){
            $orchestra->delete();
            return redirect()->route('orchesterreview')
            ->with('success', __('translation.toast.successReview'));
        }
        $counter = OrchestraInReview::where([
            ['status_id', 1],
            ['orchestra_id', Auth::user()->getOrchestra->id],
            ['review_id', $id]
            ])->select('review_id', DB::raw('count(*) as counter'))->groupBy('review_id')->first();
            $tmp = $counter->review_id;
            $count = $counter->counter-1;
            OrchestraInReview::where([
                ['status_id', 1],
                ['orchestra_id', Auth::user()->getOrchestra->id],
                ['review_id', $id]
                ])->first()->delete();
            OrchesterReview::where('id', $tmp)->update([
            'current_number_of_orchestras' => $count,
            ]);
        return redirect()->route('orchesterreview')
            ->with('success', __('translation.toast.successReview'));
            
    }

    public function dateFiltercurrent(Request $request)
    {
        $data = OrchesterReview::where('term', '>=', $request->data['dataFrom'])->where('term', '<=', $request->data['dataTo'])->where('status_id', 1)->get();
        return View::make('components.orchester-review-component')->with('review', $data)->render();
    }

    public function dateFiltercanceled(Request $request)
    {
        $data = OrchesterReview::where('term', '>=', $request->data['dataFrom'])->where('term', '<=', $request->data['dataTo'])->where('status_id', 2)->get();
        return View::make('components.orchester-review-canceled-component')->with('review', $data)->render();
    }

    
    public function dateFilterended(Request $request)
    {
        $data = OrchesterReview::where('term', '>=', $request->data['dataFrom'])->where('term', '<=', $request->data['dataTo'])->where('status_id', 3)->get();
        return View::make('components.orchester-review-ended-component')->with('review', $data)->render();
    }


    public function schedule(OrchesterReview $orchesterreview) 
    {
        $timetable = Timetable::where('review_id', $orchesterreview->id)->first();
        return view('schedule', compact('orchesterreview', 'timetable'));
    }

    public function summary(OrchesterReview $review)
    {
        $orchestra = OrchestraInReview::where('review_id', $review->id)->first();
        $juries = JuryInReview::where('orchester_reviews_id', $review->id)->get();
        $timetable1 = Timetable::where('review_id', $review->id)->first();
        $timetable =  $timetable1->getOrchestraInReview->sortByDesc('rating');
        return view('summary', compact('orchestra', 'juries', 'timetable1', 'timetable'));
    }
}