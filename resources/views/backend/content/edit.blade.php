@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            {!! Form::model($content, [
'method' => 'PATCH',
'action' => ['Admin\ContentController@update', $content->id],
'files' => true
]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Content:') !!}

                {!! Form::textarea('content',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'summernote')) !!}


            </div>
            <div class="form-group">
                {!! Form::label('name', 'Sort Order:') !!}
                {!! Form::text('sortOrder', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Page:') !!}
                <select class="form-control" name="pageId">
                    @foreach($page as $pages)
                        @if($pages->id == $content->pageId)
                            <option selected value="{{$pages->id}}">{{$pages->name}}</option>
                        @else
                            <option value="{{$pages->id}}">{{$pages->name}}</option>
                        @endif

                    @endforeach
                </select>

            </div>
            <div class="form-group">
                {!! Form::label('image', 'Upload Image:') !!}
                {!! Form::file('image',null) !!}
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
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
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection