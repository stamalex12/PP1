@extends('layouts.master')

@section('content')
    <div class="text-inter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Edit</h1>
                    {!! Form::model($resource, ['method' => 'PATCH', 'action' => ['Admin\ResourceController@update', $resource->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('amountNeeded', 'Amount Needed:') !!}
                        {!! Form::text('amountNeeded', null, ['class' => 'form-control', 'placeholder' => 'Amount Needed']) !!}
                    </div>

                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

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
        </div>
    </div>
@endsection