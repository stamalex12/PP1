@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="row">
                <h1>{{$volunteer->name}}</h1>
                <div class="col-md-6 col-xs-12" style="padding-left: 0px;">{{ Html::image($volunteer->imagePath) }}</div>

                <div class="col-md-6 col-xs-12">
                    <p>{{$volunteer->description}}</p>
                    <p>Skills Needed: {{$volunteer->skillsNeeded}}</p>
                    <p>Start Date: {{$volunteer->startDate->format('dS F Y')}}</p>
                    <p>End Date: {{$volunteer->endDate->format('dS F Y')}}</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br/>
                        <br/><br/>
                        @if (Auth::check())
                            {!! link_to_action('ApplicationsController@create','Apply', $volunteer->id, ['class' =>'btn btn-primary btn-raised']) !!}
                        @else
                            Interested in helping out? <a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a>.
                        @endif
                        {!! link_to_action('PageController@projects','Back', null, ['class' =>'btn btn-primary btn-raised']) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection