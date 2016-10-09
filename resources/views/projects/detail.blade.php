<div class="donation-details">
    <p>Thank you for your interest to donate.</p>
    <p>At the moment we are only able to proccess the transaction by phone. Please specify the amount you would like to donate and press the Commit to Donate button</p>
    @if(get_class($donatable) == 'App\ResourceNeed')
        <div class="col-md-6 col-sm-10 donation-amount">
    @else
        <div class="col-md-12 col-sm-12 donation-amount">
    @endif
        {!! Form::open(['url'=>'donate', 'class'=>'donation-form']) !!}
        <input name="id" type="hidden" value="{{$donatable->id}}">
        <input name="type" type="hidden" value="{{get_class($donatable)}}">
        <div class="input-group">
            {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount to donate']) !!}
            <span class="input-group-btn">
                {!! Form::submit('Commit to Donate', ['class'=>'btn btn-primary']) !!}
            </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@include('projects.success')

