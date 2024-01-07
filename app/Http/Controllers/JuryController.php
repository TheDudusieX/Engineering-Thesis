<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Category;
use App\Models\Orchestra;
use App\Models\Timetable;
use App\Models\JuryRating;
use App\Models\JuryInReview;
use Illuminate\Http\Request;
use App\Models\OrchesterReview;
use App\Models\OrchestraInReview;

class JuryController extends Controller
{
    public function juryInReviewsIndex() {
        $users = JuryInReview::where('jury_id', auth()->user()->id)->get();
        return view('juryInReviewsIndex', compact('users'));
    }

    public function orchestrasInReviewsIndex(OrchesterReview $review) {
        $collection = collect([]);
        $timetable = Timetable::where('review_id', $review->id)->first();
        $pivot = $timetable->getOrchestraTimes()->where('status_id', 1)->get();
        foreach($pivot as $item) {
            if(!JuryRating::where([['jury_id', auth()->user()->id], ['orchestra_id', $item->orchestra_id], ['review_id', $review->id]])->exists()) {
                $collection->push($item);
            }
        }
        return view('orchestrasInReviewsIndex', compact('collection', 'timetable'));
    }
    
    public function rateIndex(Orchestra $orchestra, OrchesterReview $review) {
        $categories = Category::get();
        $ratings = Rating::get();
        return view('rateIndex', compact('categories', 'ratings', 'orchestra', 'review'));
    }

    public function rateAdd(Request $request) {
        $request->validate([
            'orchestra' => ['required'],
            'rate' => ['required', 'array', 'min:5']
        ]);
        foreach($request->rate as $rate => $value) {
            JuryRating::create([
                'jury_id' => auth()->user()->id,
                'category_id' => $rate,
                'rate_id' => $value,
                'orchestra_id' => $request->orchestra,
                'review_id' => $request->review
            ]);
        }
        $jury = JuryRating::where([['orchestra_id', $request->orchestra],['review_id', $request->review],['jury_id', auth()->user()->id]])->get();
        $suma = 0;
        foreach ($jury as $value) {
            $suma += $value->rating->rate;
        }
        $orchestra = OrchestraInReview::where([['orchestra_id', $request->orchestra],['review_id', $request->review]])->first();
        $orchestra->update([
            'rating' => ($orchestra->rating ?? 0) + $suma,
        ]);

        return redirect()->route('orchestrasInReviewsIndex', ['review' => $request->review])
        ->with('success', __('Oceniono orkiestrę'));
    }
}
