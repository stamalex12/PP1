<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function donate(){
        return Input::get("amount");
    }
}
