@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Slider Image</h1>
            {!! Form::open(['url'=>'admin/slider', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('sortOrder', 'Sort Order:') !!}
                {!! Form::text('sortOrder', null, ['class' => 'form-control', 'placeholder' => 'Sort Order']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Upload Image:') !!}
                {!! Form::file('image',null) !!}
            </div>

            {!! Form::submit('Add', ['class'=>'btn btn-primary']) !!}
            <a href="../slider" class="btn btn-primary btn-raised">Cancel</a>
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