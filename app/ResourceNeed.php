<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceNeed extends Model
{
    protected $fillable = [
        'name', 'description', 'amountNeeded', 'imagePath'
    ];
    protected $attributes = array(
        'status' => 'Active',
    );
}
