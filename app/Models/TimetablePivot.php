<?php

namespace App\Models;

use App\Models\Orchestra;
use App\Models\Timetable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimetablePivot extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTimeTable()
    {
        return $this->belongsTo(Timetable::class);
    }

    public function getOrchestra()
    {
        return $this->hasOne(Orchestra::class,'id', 'orchestra_id');
    }

    public function getOrchestraInReview()
    {
        return $this->hasOne(OrchestraInReview::class,'orchestra_id', 'orchestra_id');
    }
}
