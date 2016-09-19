<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonies extends Model
{

    protected $fillable=['name', 'organisation', 'description', 'imagePath'];

    protected $attributes = array(
        'status' => 'Active',
    );
}
