<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteInfo extends Model
{
    protected $fillable = ['companyName', 'addressLine1', 'addressLine2', 'city', 'state', 'postCode', 'phoneNo', 'email'];

    protected $table = 'website_info';

}

