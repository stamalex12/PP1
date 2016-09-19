<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerUser extends Model
{
    protected $fillable = array('firstName', 'lastName', 'email');

    public function volunteerNeeds() {
        return $this->belongsToMany('App\VolunteerNeed', 'volunteerNeeds_users', 'user_id', 'volunteerNeed_id');
    }
}
