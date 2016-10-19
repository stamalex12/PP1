<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class VolunteeringNeed extends Model
{
    protected $fillable = [
        'name', 'description', 'startDate', 'endDate', 'skillsNeeded', 'imagePath'
    ];
    protected $attributes = array(
        'status' => 'Active',
    );
    protected $dates = ['startDate', 'endDate'];
    public function volunteerUsers() {
        return $this->belongsToMany('App\User', 'volunteerNeeds_users', 'volunteerNeed_id', 'user_id');
    }
}
