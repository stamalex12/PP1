<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['name', 'age', 'aspirations', 'gender', 'image'];

    protected $table = 'children';
}
