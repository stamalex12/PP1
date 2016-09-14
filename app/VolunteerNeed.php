<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VolunteerUser;

class VolunteerNeed extends Model
{
    protected $fillable = [
        'name', 'description', 'startDate', 'endDate', 'skillNeeded', 'imagePath'
    ];
    protected $attributes = array(
        'status' => 'Active',
    );

    public function volunteerUsers() {
        return $this->belongsToMany('App\VolunteerUser', 'volunteerNeeds_users', 'volunteerNeed_id', 'user_id');
    }
}
