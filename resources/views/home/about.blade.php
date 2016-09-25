@extends('layouts.master')

@section('content')
    <h1>About</h1>

    @foreach($content as $contents)
        <div class="row">
            <div class="col-md-12">
                <h3>{{$contents->title}}</h3>
                <p>{!!  nl2br(e($contents->content)) !!}</p>
                <div class="divider"></div>
            </div>
        </div>
    @endforeach
@endsection
