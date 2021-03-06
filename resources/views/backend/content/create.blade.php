@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Content</h1>
            {!! Form::open(['url'=>'/admin/content', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Content:') !!}
                {{--{!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}--}}
                {{Form::textarea('content',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'summernote'))}}

                <div class="form-group">
                    {!! Form::label('name', 'Sort Order:') !!}
                    {!! Form::text('sortOrder', null, ['class' => 'form-control', 'placeholder' => 'Sort Order']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Page:') !!}
                    <select class="form-control" name="page">
                        @foreach($page as $pages)
                            <option value="{{$pages->id}}">{{$pages->name}}</option>
                        @endforeach
                    </select>

                    {{--{!! Form::select('page', 'name', $page,  ['class' => 'form-control']) !!}
                    {!! Form::text('page', null, ['class' => 'form-control', 'placeholder' => 'Page']) !!}--}}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Upload Image:') !!}
                    {!! Form::file('image',null) !!}
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
