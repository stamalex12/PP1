@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>View Rooms</h1>
            <a href="room/create" class="btn btn-primary btn-raised">Create</a>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($room as $aroom)

                    <tr>
                        <th>{{$aroom->name}}</th>
                        <th>{{$aroom->description}}</th>
                        <th>{{$aroom->status}}</th>
                        <th>{{$aroom->organisation}}</th>
                        <th>{!!link_to_action('Admin\RoomController@edit', 'Edit', $aroom->id) !!} |
                            @if($aroom->status == "Active")
                                {!! link_to_action('Admin\RoomController@statusToggle','Disable', $aroom->id) !!}
                            @else
                                {!! link_to_action('Admin\RoomController@statusToggle','Enable', $aroom->id) !!}
                            @endif
                            | {!! link_to_action('Admin\RoomController@destroy','Remove', $aroom->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

