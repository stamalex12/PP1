<?php

namespace App\Http\Controllers;

use App\Donation;
use App\ResourceNeed;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class ProjectController extends Controller
{
    public function donate(){
        $id = Request::get("id");
        $type = Request::get("type");
        $user_id = \Auth::id();
        $amt = Request::get("amount");

        $d = Donation::create(array(
            'donatable_id'      => $id,
            'donatable_type'    => $type,
            'user_id'           => $user_id,
            'amount'            => $amt
        ));
        return $d;
    }
}
