{!! Form::open() !!}
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}


</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::textarea('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
</div>
{!! Form::submit('Add Content', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

form