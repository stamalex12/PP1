<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'name', 'description', 'amount', 'resourceNeed'

    ];

    protected $table = 'expenses';
}
