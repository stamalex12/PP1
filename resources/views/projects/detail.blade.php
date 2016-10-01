<div id="donation-details">
<p>Thank you for your interest to donate.</p>
<p>At the moment we are only able to proccess the transaction by phone. Please specify the amount you would like to donate and press the Commit to Donate button</p>
<div id="donation-amount" class="col-md-6 col-sm-10">
    {!! Form::open(['url'=>'donate', 'id'=>'donation-form']) !!}
    <div class="input-group">
        {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount to donate']) !!}
        <span class="input-group-btn">
            {!! Form::submit('Commit to Donate', ['class'=>'btn btn-primary']) !!}
        </span>
    </div>
    {!! Form::close() !!}
</div>
</div>
<div id="donation-success" class="col-md-6 col-sm-10" style="display: none;">
    <p>Thank you for your donation.</p>
    {!! link_to('#', 'My Donations', ['class' => 'btn btn-default btn-raised']) !!}
</div>

