@extends('layouts.master')

@section('content')
    @include('profile.sidebar')

        <div class="col-md-10"  style="border-left: 2px solid darkgrey;">

            {{--TODO: yield('content') for different pages--}}

            <div class="col-md-4">

            {{--TODO: include image from profile otherwise a sample placeholder image--}}
            @if(Auth::user()->image != "")
                <img src="{{URL::asset(Auth::user()->image)}}">
            @else
                <img src="{{URL::asset('images/profile-placeholder.jpg')}}">
            @endif
        </div>
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h3 style="padding-top: 0;">Update Profile details</h3>
            {!! Form::model(Auth::user(), ['method' => 'PATCH', 'action' => ['ProfileController@update'], 'files' => true, 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('username', 'Username:') !!}
                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            </div>
            {{--TODO: Phone number to be null by default instead of 0--}}
            <div class="form-group">
                {!! Form::label('phone', 'Phone number(including country code):') !!}
                {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('country', 'Country:') !!}
                <select id="country" name="country" class="form-control">
                    @foreach($countries as $code => $country)
                        <option value="{{ $code }}" {{ Auth::user()->country == $code ? 'selected': ''}}>{{ $country }}</option>
                    @endforeach
                </select>
            </div>
                <div class="form-group">
                    {!! Form::label('name', 'Subscribe to Email:') !!}
                    {!! Form::select('subscriber', array('1' => 'Yes', '0' => 'No'),(Auth::user()->subscriber), ['class' => 'form-control']) !!}
                </div>

            <div class="form-group">
                {!! Form::label('wwc', 'Working with Children check upload:') !!}
                {!! Form::file('wwc', null) !!}
            </div>

            @if(Auth::user()->wwc != "")
            <div class="alert alert-info" role="alert">
                You have already provided a copy of your Working With Children check. Feel free to upload a new one
            </div>
            @endif

            <div class="form-group">
                {!! Form::label('image', 'Profile picture:') !!}
                {!! Form::file('image',null) !!}
            </div>

            <div class="form-group">
                {!! Form::label('old_password', 'Current password:') !!}
                {!! Form::password('old_password', null, ['class' => 'form-control', 'placeholder' => 'Old password']) !!}
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="form-group">
                {!! Form::label('update-password', 'Change Password:') !!}
                <input id="update-password" type="checkbox" name="update-password">
            </div>
            <div id="passwordFields" hidden>
                <div class="form-group">
                    {!! Form::label('new_password', 'New password:') !!}
                    {!! Form::password('new_password', null, ['class' => 'form-control', 'placeholder' => 'New password']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('new_password_confirmation', 'Confirm new password:') !!}
                    {!! Form::password('new_password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'New password']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Subscribe to Email:') !!}
                    {!! Form::select('email', array('1' => 'Yes', '0' => 'No'),(Auth::user()->subscriber), ['class' => 'form-control']) !!}
                </div>
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
    <script type="text/javascript">
        $('#update-password').on('click', function () {
            // you want to use .prop (it returns a boolean and is instant result)
            //unlike .attr('checked') which has it's issue cross browser checking for true-ness

            var checked = $(this).prop('checked'),
                    _passwordFields = $(this).parent().parent().find('#passwordFields');

            if (checked) {
                _passwordFields.show();
            }

            else { _passwordFields.hide(); }
        });
    </script>
@endsection