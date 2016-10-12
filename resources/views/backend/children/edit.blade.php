@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            {!! Form::model($child, [
                'method' => 'PATCH',
                'action' => ['Admin\ChildrenController@update', $child->id],
                'files' => true
                ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content', 'Age:') !!}

                {!! Form::text('age' ,null, array('class' => 'form-control')) !!}


            </div>
            <div class="form-group">
                {!! Form::label('name', 'Aspirations:') !!}
                {!! Form::textarea('aspirations', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Gender:') !!}
                <select class="form-control" name="gender">
                    @if($child->gender == 'Male')

                        <option selected value="{{$child->gender}}">{{$child->gender}}</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    @elseif($child->gender == 'Female')
                        <option value="Male">Male</option>
                        <option selected value="{{$child->gender}}">{{$child->gender}}</option>
                        <option value="Other">Other</option>
                    @else
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option selected value="{{$child->gender}}">{{$child->gender}}</option>
                    @endif
                </select>

            </div>
            @if($child->image != null)
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label>Current Image</label>
                        {{Html::image($child->image, 'alt', ['class' => 'edit-image-placeholder'])}}

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
                <a href="../children" class=" btn btn-primary btn-raised">Cancel</a>
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