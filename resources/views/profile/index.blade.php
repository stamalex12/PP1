@extends('layouts.master')

@section('content')
        <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="btn-group-vertical">
                <a href="profile" class="btn btn-default btn-raised">My Profile</a>
                <a href="profile/donations" class="btn btn-default btn-raised">My Donations</a>
                <a href="profile/volunteering" class="btn btn-default btn-raised">My Volunteering</a>
            </div>
        </div>
        <div class="col-md-10"  style="border-left: 2px solid darkgrey;">

            {{--TODO: yield('content') for different pages--}}

            <div class="col-md-4">

                {{--TODO: include image from profile otherwise a sample placeholder image--}}

                <img src="{{URL::asset('images/profile-placeholder.jpg')}}">
            </div>
            <div class="col-md-6">
                <h3 style="padding-top: 0;">Update Profile details</h3>
                {!! Form::model(Auth::user(), ['method' => 'PATCH', 'action' => ['ProfileController@update'], 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('username', 'Username:') !!}
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone', 'Phone number(including country code):') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('country', 'Country:') !!}
                    {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('old_password', 'Old password:') !!}
                    {!! Form::text('old_password', null, ['class' => 'form-control', 'placeholder' => 'Old password']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('new_password', 'New password:') !!}
                    {!! Form::text('new_password', null, ['class' => 'form-control', 'placeholder' => 'New password']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('wwc', 'Working with Children check upload:') !!}
                    {!! Form::file('wwc',null) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Profile picture:') !!}
                    {!! Form::file('image',null) !!}
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
@endsection