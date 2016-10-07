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
                {!! Form::label('content', 'Content:') !!}

                {!! Form::textarea('content' ,null, array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'summernote')) !!}


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
            @if($content->image != null)
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label>Current Image</label>

                        {{Html::image($content->image, 'alt', ['class' => 'edit-image-placeholder'])}}

                    </div>
                </div>
            @endif
            <div class="col-md-8 col-xs-12 col-sm-6">
                <div class="form-group">
                    {!! Form::label('image', 'Upload Image:') !!}
                    {!! Form::file('image',null) !!}
                </div>
            </div>
            <div class="col-md-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="../content" class="btn btn-primary btn-raised">Cancel</a>
            </div>
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
        $(document).ready(function () {

        });
    </script>
@endsection