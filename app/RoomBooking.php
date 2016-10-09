<?php

namespace App;

use App\Room;
use App\User;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $fillable=['userId', 'roomId', 'startDate', 'endDate','firstName','lastName'];

    //each booking can contain only one room at this moment.
    public function room(){
        return $this->belongsTo('App\Room');
    }

    //each booking can belongs to  one user.
    public function user(){
        return $this->belongsTo('App\User');
    }
}
