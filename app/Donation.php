<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donnorName', 'amount', 'resourceNeed'
    ];

    protected $table = 'donations';
}
