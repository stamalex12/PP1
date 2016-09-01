@extends('layouts.master')

@section('content')
    <div class="text-inter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Create Resource Need</h1>
                    {!! Form::open(['url'=>'dashboard/resources']) !!}
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


                    {!! Form::submit('Add', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>

@endsection