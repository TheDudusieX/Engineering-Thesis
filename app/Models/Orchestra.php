<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrchestraInReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orchestra extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'orchestraname',
        'numberofmembers',
        'bandmaster',
        'president',
        'description',
        'headquarter',
        'agent_id'
    ]; 

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'agent_id');
    }

    public function getOrchesterReview()
    {
        return $this->hasMany(OrchestraInReview::class, 'orchestra_id', 'id');
    }
}