<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\Orchestra;
use App\Models\JuryInReview;
use App\Models\OrchesterReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrchestraInReview extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'orchestra_id',
        'rating',
        'review_id',
        'status_id'
    ];

    public function orchestra()
    {
        return $this->hasOne(Orchestra::class, 'id', 'orchestra_id');
    }

    public function rate()
    {
        return $this->hasOne(Rating::class);
    }

    public function review()
    {
        return $this->hasOne(OrchesterReview::class, 'id', 'review_id');
    }

    public function jury()
    {
        return $this->hasOne(JuryInReview::class, 'orchester_reviews_id', 'review_id');
    }

    
    public function timetablePivot()
    {
        return $this->hasOne(TimetablePivot::class, 'orchestra_id', 'orchestra_id');
    }
}
