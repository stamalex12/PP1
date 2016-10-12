<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\RedirectResponse;
use App\RoomBooking;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use DateTime;
use DB;

class RoomBookingController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
//          A logged in user can only get his own booking information
            $data = [
            'page_title' => 'Booking List',
            'roombooking'=> RoomBooking::where('userId','=',Auth::id())->orderBy('startDate')->get(),
            ];
            return view('roombooking/list', $data);
        }

        else{
            return redirect('/login');
        }
    }


    public function create()
    {

        if (Auth::check())
        {
            // The user is logged in...
            $rooms = Room::where('status', '=', 'Active')->get();
            return view('roombooking/create', compact('rooms'));
        }

        else{
            return redirect('/login');
        }

    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'time'	=> 'required',
            'roomId'=> 'required',
            'firstName'=>  'required',
            'lastName'=>'required'
        ]);

        $check=$this->checkRoomAvailability($request->input('roomId'),$request->input('time'));

        if ($check !=false) {

            $time = explode(" - ", $request->input('time'));

            $roombooking = new RoomBooking;
            $roombooking->roomId = $request->input('roomId');
            $roombooking->userId = Auth::id();
            $roombooking->firstName = $request->input('firstName');
            $roombooking->lastName = $request->input('lastName');
            $roombooking->startDate = $this->change_date_format($time[0]);
            $roombooking->endDate = $this->change_date_format($time[1]);
            $roombooking->save();

            $request->session()->flash('success', 'The booking was successfully saved!');
            return redirect('roombooking/create');
        }
        else{
            $request->session()->flash('fail', 'The room is not available at this time slot! ');
            return redirect('roombooking/create');
        }

    }


    public function show($id)
    {
        $roombooking = RoomBooking::findOrFail($id);
        if ($roombooking->userId == Auth::id())
        {
            $first_date = new DateTime($roombooking->startDate);
            $second_date = new DateTime($roombooking->endDate);
            $difference = $first_date->diff($second_date);
            $data = [
                'roombooking' => $roombooking,
                'duration' => $this->format_interval($difference)
            ];

            return view('roombooking/view', $data);
        }
        else{
            return redirect('booking');
        }
    }



    public function edit($id)
    {
        $roombooking = RoomBooking::findOrFail($id);
        if ($roombooking->userId == Auth::id())
        {
            $roombooking->startDate = $this->change_date_format_fullcalendar($roombooking->startDate);
            $roombooking->endDate = $this->change_date_format_fullcalendar($roombooking->endDate);

            $data = [
                'page_title' => 'Edit ' . $roombooking->id,
                'roombooking' => $roombooking,
            ];

            return view('roombooking/edit', $data);
        }
        else{
            return redirect('roombooking');
        }
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'time'	=> 'required',
            'firstName'=>  'required',
            'lastName'=>'required'
        ]);
        $roombooking = RoomBooking::findOrFail($id);
        $check = $this->checkRoomAvailability($roombooking->roomId,$request->input('time'));

        if ($check !=false){
            $time = explode(" - ", $request->input('time'));


            $roombooking->roomId        = $request->input('roomId');
            $roombooking->userId        = Auth::id();
            $roombooking->firstName     = $request->input('firstName');
            $roombooking->lastName      = $request->input('lastName');
            $roombooking->startDate 	= $this->change_date_format($time[0]);
            $roombooking->endDate 		= $this->change_date_format($time[1]);
            $roombooking->save();

            return redirect('roombooking');
        }

        else{
            //time clash
            $request->session()->flash('fail', 'The room is not available at this time slot! Or the room is not exist!');
            return redirect('roombooking');
        }
    }


    public function destroy($id)
    {
        $roombooking = RoomBooking::find($id);
        $roombooking->delete();

        return redirect('roombooking');
    }


    public function checkRoomAvailability($roomId,$times)
    {
        $room = Room::find($roomId);
        if (empty($room))
        {
            return false;
        }

        $time = explode(" - ", $times);

        $start = $this->change_date_format($time[0]);
        $end = $this->change_date_format($time[1]);

        // search for any possible clash with available events

        $scene1 = DB::table('room_bookings')
            ->where('roomId','=',$roomId)
            ->where('startDate', '<=', $start)
            ->where('endDate', '>=', $end)
            ->count();

        $scene2 = DB::table('room_bookings')
            ->where('roomId','=',$roomId)
            ->where('startDate', '<', $start)
            ->where('endDate', '>', $end)
            ->count();

        $scene3 = DB::table('room_bookings')
            ->where('startDate', '>=', $start)
            ->where('endDate', '<=', $end)
            ->count();

        $scene4 = DB::table('room_bookings')
            ->where('roomId','=',$roomId)
            ->where('startDate', '>', $start)
            ->where('endDate', '<', $end)
            ->count();

        $scene5 = DB::table('room_bookings')
            ->where('roomId','=',$roomId)
            ->where('startDate', '>', $start)
            ->where('startDate', '<', $end)
            ->count();

        // if any event exist, means more than 0, return false
        if($scene1 + $scene2 + $scene3 + $scene4 + $scene5 > 0)
        {
            return false;
        }

        return true;
    }


    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }


    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $time->format('d/m/Y H:i:s');
    }


    public function format_interval(\DateInterval $interval)
    {
        $result = "";
        if ($interval->y) { $result .= $interval->format("%y year(s) "); }
        if ($interval->m) { $result .= $interval->format("%m month(s) "); }
        if ($interval->d) { $result .= $interval->format("%d day(s) "); }
        if ($interval->h) { $result .= $interval->format("%h hour(s) "); }
        if ($interval->i) { $result .= $interval->format("%i minute(s) "); }
        if ($interval->s) { $result .= $interval->format("%s second(s) "); }

        return $result;
    }

}
