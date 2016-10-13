@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Volunteer Application</h1>
            {!! Form::open(['url'=>'applications', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('taskName', 'Task Name:') !!}
                {!! Form::text('taskName', $need->first()->name, ['class' => 'form-control', 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('skillsAndQuals', 'Skills and Qualifications:') !!}
                {!! Form::text('skillsAndQuals', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('startDate', 'Start Date:') !!}
                {!! Form::date('startDate', $need->first()->startDate, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('endDate', 'End Date:') !!}
                {!! Form::date('endDate', $need->first()->endDate, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone', 'Contact Phone Number:') !!}
                {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email Address:') !!}
                {!! Form::text('email', Auth::user()->email, ['class' => 'form-control',]) !!}
            </div>

            @if(Auth::user()->wwc != "")
                <div class="alert alert-info" role="alert">
                    You already have a WWC check on file. You can upload a new one below, otherwise the existing file will  be used. If you do choose to upload a new file, it will be saved to your profile.
                </div>
            @endif

            <div class="form-group">
                {!! Form::label('wwc', 'Working with Children check upload:') !!}
                {!! Form::file('wwc', null) !!}
            </div>

            {{ Form::hidden('user_id', Auth::user()->id) }}
            {{ Form::hidden('need_id', $need->first()->id) }}

            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            <a href="../applications" class="btn btn-primary btn-raised">Cancel</a>
            {!! Form::close() !!}

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif


            <div class="divider"></div>
        </div>
    </div>
@endsection