@extends('layouts.master')

@section('content')
    <h1>About</h1>
    <div class="text-inter">
        <div class="container">
            @foreach($content as $contents)
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{$contents->title}}</h3>
                        <p>{!! $contents->content !!}</p>
                        <div class="divider"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
