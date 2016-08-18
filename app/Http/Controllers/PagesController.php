<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        $users = DB::select('select * from content');

        return view('page', ['users' => $users]);
    }
}
