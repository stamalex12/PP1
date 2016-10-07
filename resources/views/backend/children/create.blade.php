@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Child</h1>
            {!! Form::open(['url'=>'/admin/children', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Aspirations:') !!}
                {{Form::textarea('aspirations',null,array('class' => 'form-control', 'placeholder'=>'Aspirations'))}}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Age:') !!}
                {!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => 'Age']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Gender:') !!}
                <select class="form-control" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Upload Image:') !!}
                {!! Form::file('image',null) !!}
            </div>

            {!! Form::submit('Add Child', ['class'=>'btn btn-primary']) !!}
            <a href="../children" class="btn btn-primary btn-raised">Cancel</a>
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
@endsection
