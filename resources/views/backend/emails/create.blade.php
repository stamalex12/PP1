@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Email</h1>
            {!! Form::open(['url'=>'/admin/email']) !!}
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('name', 'Email Address') !!}
                {!! Form::text('emailTo', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Subject:') !!}
                {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Message:') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Message']) !!}
            </div>



            {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
            <a href="../dashboard" class="btn btn-primary btn-raised">Cancel</a>
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
