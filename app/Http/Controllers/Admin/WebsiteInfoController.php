<?php

namespace App\Http\Controllers\Admin;

use App\WebsiteInfo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class WebsiteInfoController extends Controller
{

    public function index()
    {
        $currentWebsite = WebsiteInfo::all();
        return view('backend.websiteinfo.index')->with('website', $currentWebsite);
    }

    public function create()
    {

    }

    public function store(Requests\WebsiteInfoFormRequest $request)
    {
        $imageName = NULL;
        $currentWebsite = WebsiteInfo::all()->first();
        if (count($currentWebsite) == 0){
            $imagename = NULL;
            if( $request->hasFile('image') ) {
                $imageName = 'logo.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path() . '/images/websiteinfo/', $imageName);
                Image::make(public_path() . '/images/websiteinfo/'.$imageName)->resize(70,70)->save();
            }
            $websiteInfo = new WebsiteInfo(array(
            'companyName' => $request->get('companyName'),
            'addressLine1' => $request->get('addressline1'),
            'addressLine2' => $request->get('addressline2'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'postCode' => $request->get('postcode'),
            'country' => $request->get('country'),
            'phoneNo' => $request->get('phoneNo'),
            'email' => $request->get('email'),
            'logofilepath' => '/images/websiteinfo/' . $imageName
        ));$websiteInfo->save();
        }
        else {
            if ($request->hasFile('image')) {
                $imageName = 'logo.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path() . '/images/websiteinfo/', $imageName);
                Image::make(public_path() . '/images/websiteinfo/' . $imageName)->resize(70, 70)->save();
            }
            $currentWebsite->companyName = $request->get('companyName');
            $currentWebsite->addressLine1 = $request->get('addressline1');
            $currentWebsite->addressLine2 = $request->get('addressline2');
            $currentWebsite->city = $request->get('city');
            $currentWebsite->state = $request->get('state');
            $currentWebsite->postCode = $request->get('postcode');
            $currentWebsite->country = $request->get('country');
            $currentWebsite->phoneNo = $request->get('phoneNo');
            $currentWebsite->email = $request->get('email');
            if ($imageName != null) {
                $currentWebsite->logofilepath = '/images/websiteinfo/' . $imageName;
            }
            $currentWebsite->save();

        }

        return redirect('admin/websiteinfo')->with('status', 'Your information has been updated successfully.');

    }

}
