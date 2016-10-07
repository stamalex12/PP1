<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = array('amount', 'user_id', 'donatable_id', 'donatable_type');

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function donatable()
    {
        return $this->morphTo();
    }
}
