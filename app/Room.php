<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table="room";

    protected $fillable=['name', 'type', 'price', 'description', 'imagePath'];


    protected $attributes = array(
        'status' => 'Active',
    );

    public function roombooking(){
        return $this->hasMany('RoomBooking');
    }

}
