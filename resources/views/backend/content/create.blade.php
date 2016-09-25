@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Content</h1>
            {!! Form::open(['url'=>'/admin/content']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Content:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
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
            <a href="../content" class="btn btn-primary btn-raised">Cancel</a>
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
