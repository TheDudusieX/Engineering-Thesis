<?php

namespace App\Models;

use App\Models\Orchestra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrchesterReview extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'maximum_number_of_orchestras',
        'current_number_of_orchestras',
        'term',
        'start_time',
        'place',
        'organizer',
        'deadline',
        'status_id',
        'information'
    ]; 

    public function getOrganizer()
    {
        return $this->hasOne(Orchestra::class, 'orchestraname', 'organizer');
    }

    public function getMembers()
    {
        return $this->hasMany(OrchestraInReview::class, 'review_id', 'id');
    }

    public function getJury()
    {
        return $this->hasMany(JuryInReview::class, 'orchester_reviews_id', 'id');
    }
}
