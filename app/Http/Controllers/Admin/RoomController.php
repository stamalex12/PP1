<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room= Room::all();
        return view('backend.room.index',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateRoomRequest $request)
    {
        $room= new Room(array(
            'name'=>$request->get('name'),
            'type'=>$request->get('type'),
            'price'=>$request->get('price'),
            'description'=>$request->get('description')

        ));
        $room->save();

        if( $request->hasFile('image') ) {

            $imageName = $room->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/$room/', $imageName);

            $room->imagePath = '/images/testimonies/' . $imageName;
            Image::make(public_path() . $room->imagePath)->resize(370, 350)->save();
            $room->save();
        }

        return redirect('admin/room');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $room= Room::where('status', '=', 'Active')->get();
        view('room.index',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room= Room::find($id);
        return view('backend/room.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateRoomRequest $request, $id)
    {
        $room= Room::findOrFail($id);
        $room->update($request->all());

        return redirect('admin/room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::destroy($id);
        return redirect('admin/room');
    }



    public function statusToggle($id){
        $room = Room::findOrFail($id);
        if($room->status == "Active"){
            $status = "Disabled";
        }else{
            $status = "Active";
        }
        $room->status = $status;
        $room->save();
        return redirect('admin/room');
    }
}
