@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Room</h1>
            {!! Form::model($room, ['method' => 'PATCH', 'action' => ['Admin\RoomController@update', $room->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('type', 'Type:') !!}
                {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Type']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            </div>


            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="../type" class="btn btn-default btn-raised">Cancel</a>

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