@extends('layouts.master')

@section('content')
    <div class="text-inter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Edit</h1>
                    {!! Form::model($content, [
      'method' => 'PATCH',
      'action' => ['ContentController@update', $content->id]
  ]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Content:') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Sort Order:') !!}
                        {!! Form::text('sortOrder', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Page:') !!}
                        {!! Form::text('pageId', null , ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}



                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>
@endsection