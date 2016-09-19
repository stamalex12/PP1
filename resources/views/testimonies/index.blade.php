@extends('layouts.master')

@section('content')
    <h1>Testimonies</h1>
    <div class="text-inter">
        <div class="container">
            <h2>Please read below to see what a few of our charity partners have to say about us:</h2>
            @foreach($testimonies as $testimonie)
                <div class="row">
                    <div class="panel panel-default col-sm-12 col-md-8 col-md-offset-2 col-xs-12">
                        <div class="row">
                            <div class="col-md-6" style="padding-left: 0px;">{{ Html::image($testimonie->imagePath) }}</div>

                            <div class="col-md-6">
                                <h3>{{$testimonie->name}}</h3>
                                <p>{{$testimonie->description}}</p>
                                <p>Organisation: {{$testimonie->organisation}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection