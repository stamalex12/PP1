<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'need_id', 'taskName', 'skillsAndQuals', 'startDate', 'endDate', 'files', 'phone', 'email', 'status'

    ];
    protected $attributes = array(
        'status' => 'Active',
    );
}