<?php

namespace App\Http\Controllers\Admin;

use App\Donation;
use App\ResourceNeed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = donation::all();
        return view('backend.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resources = resourceNeed::all('name');
        return view('backend.donations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateDonnationRequest $request)
    {
        $donnation = new Donation(array(
            'donnorName' => $request->get('donnorName'),
            'amount' => $request->get('amount'),
            'resourceNeed' => $request->get('resourceNeed'),
        ));
        $donnation->save();

        return redirect('admin/donations');
    }

    public function destroy($id)
    {
        donation::destroy($id);

        return redirect('admin/donations');

    }

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
