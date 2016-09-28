<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = ['testimonies', 'projects', 'resourceneeds', 'volunteerprograms', 'email', 'childdetails', 'userprofiles'];
}
