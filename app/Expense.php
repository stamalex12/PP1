<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'need_id', 'user_id', 'taskName', 'skillsAndQuals', 'startDate', 'endDate', 'files', 'phone', 'email', 'status'
    ];

    protected $table = 'applications';
}
