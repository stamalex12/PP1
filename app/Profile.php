<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //TODO: Create profile when user is created
    protected $fillable = [
        'user_id', 'phone', 'country', 'wwc', 'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
