<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrchesterReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JuryInReview extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'jury_id',
        'orchester_reviews_id',
        'rating_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function review()
    {
        return $this->hasOne(OrchesterReview::class, 'id', 'orchester_reviews_id');
    }

    public function juryRating()
    {
        return $this->hasMany(JuryRating::class, 'review_id', 'orchester_reviews_id');
    }


    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'jury_id');
    }
}

