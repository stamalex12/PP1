@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            {!! Form::model($expense, ['method' => 'PATCH', 'action' => ['Admin\ExpensesController@update', $expense->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('amount', 'Amount:') !!}
                {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount']) !!}
        </div>



        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="../expenses" class="btn btn-primary btn-raised">Cancel</a>

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