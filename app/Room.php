<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['name', 'type', 'description', 'imagePath'];

    protected $attributes = array(
        'status' => 'Active',
    );
}
