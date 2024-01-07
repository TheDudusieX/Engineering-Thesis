<?php

namespace App\Models;

use App\Models\TimetablePivot;
use App\Models\OrchestraInReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timetable extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getOrchestraTimes()
    {
        return $this->hasMany(TimetablePivot::class, 'timetable_id', 'id');
    }

    public function getReview()
    {
        return $this->hasOne(OrchesterReview::class,'id', 'review_id');
    }

    public function getOrchestraInReview()
    {
        return $this->hasMany(OrchestraInReview::class,'review_id', 'review_id');
    }
}
