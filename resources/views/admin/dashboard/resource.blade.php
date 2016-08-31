@extends('layouts.master')

@section('content')
    <div class="text-inter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Create Content</h1>
                    {!! Form::open(['url'=>'/content']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Content:') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Conent']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Sort Order:') !!}
                        {!! Form::text('sortOrder', null, ['class' => 'form-control', 'placeholder' => 'Sort Order']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Page:') !!}
                        {!! Form::text('page', null, ['class' => 'form-control', 'placeholder' => 'Page']) !!}
                    </div>


                    {!! Form::submit('Add Content', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>

@endsection