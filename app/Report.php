<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Report extends Model
{
    public function index()
    {
        return view('reports.index');
    }


}
