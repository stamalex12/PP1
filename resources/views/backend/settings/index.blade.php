@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>System Settings</h1>
            <p>Select what you would like on and off</p>
            @foreach ($errors->all() as $error) <p class="alert alert-danger">{{ $error }}</p> @endforeach

            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div> @endif

            {!! Form::open(['url'=>'admin/settings', 'files' => true]) !!}
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Testimonies:') !!}
                    {!! Form::select('testimonies', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->testimonies)? (\App\System::all()->first()->testimonies) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Projects:') !!}
                    {!! Form::select('projects', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->projects)? (\App\System::all()->first()->projects) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Resource Needs:') !!}
                    {!! Form::select('resourceneeds', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->resourceneeds)? (\App\System::all()->first()->resourceneeds) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Volunteer Programs:') !!}
                    {!! Form::select('volunteerprograms', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->volunteerprograms)? (\App\System::all()->first()->volunteerprograms) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Email:') !!}
                    {!! Form::select('email', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->email)? (\App\System::all()->first()->email) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Child Details:') !!}
                    {!! Form::select('childdetails', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->childdetails)? (\App\System::all()->first()->childdetails) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'User Profiles:') !!}
                    {!! Form::select('userprofiles', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->userprofiles)? (\App\System::all()->first()->userprofiles) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Slider:') !!}
                    {!! Form::select('slider', array('1' => 'On', '0' => 'Off'), isset(\App\System::all()->first()->slider)? (\App\System::all()->first()->slider) : '1', ['class' => 'form-control']) !!}
                </div>
            </div>


            <div class="col-md-12">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                <a href="dashboard" class="btn btn-primary btn-raised">Cancel</a>
            </div>
            {!! Form::close() !!}


        </div>
    </div>

@endsection