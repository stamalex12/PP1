@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="panel panel-default col-sm-12 col-md-8 col-md-offset-2 col-xs-12">
            <div class="row">
                <div class="col-md-6" style="padding-left: 0px;">{{ Html::image($volunteer->imagePath) }}</div>

                <div class="col-md-6">
                    <h3>{{$volunteer->name}}</h3>
                    <p>{{$volunteer->description}}</p>
                    <p>Skills Needed: {{$volunteer->skillsNeeded}}</p>
                    <p>Start Date: {{$volunteer->startDate->format('dS F Y')}}</p>
                    <p>End Date: {{$volunteer->endDate->format('dS F Y')}}</p>
                </div>
                @if (Auth::check())
                    {!! link_to_action('ApplicationsController@create','Apply', $volunteer->id, ['class' =>'btn btn-primary btn-raised']) !!}
                @else
                    Interested in helping out? <a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a>.
                @endif
                {!! link_to_action('PageController@projects','Back', null, ['class' =>'btn btn-primary btn-raised']) !!}
            </div>
        </div>
    </div>
@endsection