@extends('layouts.master')

@section('content')
    <h1>Visitor Rooms</h1>

    <h2>Please read below to see our visitor rooms:</h2>
    <a href="booking" class="btn btn-primary btn-raised">Book a Room</a>
    @foreach($room as $aroom)
        <div class="row">
            <div class="panel panel-default col-sm-12 col-md-8 col-md-offset-2 col-xs-12">
                <div class="row">
                    <div class="col-md-6" style="padding-left: 0px;">{{ Html::image($aroom->imagePath) }}</div>

                    <div class="col-md-6">
                        <h3>{{$aroom->name}}</h3>
                        <p>Room ID: {{$aroom->id}}</p>
                        <p>Room Type: {{$aroom->type}}</p>
                        <p>Description{{$aroom->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



@endsection