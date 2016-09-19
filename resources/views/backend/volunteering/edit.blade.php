@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            {!! Form::model($volunteerNeed, ['method' => 'PATCH', 'action' => ['Admin\VolunteerController@update', $volunteerNeed->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('startDate', 'Start Date:') !!}
                {!! Form::date('startDate', null, ['class' => 'form-control', 'placeholder' => 'Start Date']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('endDate', 'End Date:') !!}
                {!! Form::date('endDate', null, ['class' => 'form-control', 'placeholder' => 'End Date']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('skillsNeeded', 'Skills Needed:') !!}
                {!! Form::text('skillsNeeded', null, ['class' => 'form-control', 'placeholder' => 'Skills Needed']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Upload Image:') !!}
                {!! Form::file('image',null) !!}
            </div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="../volunteering" class="btn btn-default btn-raised">Cancel</a>

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