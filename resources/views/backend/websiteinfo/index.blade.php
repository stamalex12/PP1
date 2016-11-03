@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Website Information</h1>
                        @foreach ($errors->all() as $error) <p class="alert alert-danger">{{ $error }}</p> @endforeach

                        @if (session('status')) <div class="alert alert-success"> {{ session('status') }} </div> @endif

                        {!! Form::open(['url'=>'admin/websiteinfo', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('companyName', 'Company Name:') !!}
                            {!! Form::text('companyName', isset(\App\WebsiteInfo::all()->first()->companyName)? (\App\WebsiteInfo::all()->first()->companyName) : null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('addressline1', 'Address Line 1:') !!}
                            {!! Form::text('addressline1', isset(\App\WebsiteInfo::all()->first()->addressLine1)? (\App\WebsiteInfo::all()->first()->addressLine1) : null, ['class' => 'form-control']) !!}<div class="form-group">
                       </div>

                        <div class="form-group">
                            {!! Form::label('addressline2', 'Address Line 2:') !!}
                            {!! Form::text('addressline2', isset(\App\WebsiteInfo::all()->first()->addressLine2)? (\App\WebsiteInfo::all()->first()->addressLine2) : null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('city', 'Suburb\City:') !!}
                            {!! Form::text('city', isset(\App\WebsiteInfo::all()->first()->city)? (\App\WebsiteInfo::all()->first()->city) : null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('state', 'State\Province:') !!}
                            {!! Form::text('state', isset(\App\WebsiteInfo::all()->first()->state)? (\App\WebsiteInfo::all()->first()->state) : null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('postcode', 'Post Code:') !!}
                            {!! Form::text('postcode', isset(\App\WebsiteInfo::all()->first()->postCode)? (\App\WebsiteInfo::all()->first()->postCode) : null, ['class' => 'form-control' ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'Country:') !!}
                            {!! Form::text('country', isset(\App\WebsiteInfo::all()->first()->country)? (\App\WebsiteInfo::all()->first()->country) : null, ['class' => 'form-control' ]) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('phoneNo', 'Phone Number:') !!}
                            {!! Form::text('phoneNo', isset(\App\WebsiteInfo::all()->first()->phoneNo)? (\App\WebsiteInfo::all()->first()->phoneNo) : null, ['class' => 'form-control' ]) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('email', 'Email Address:') !!}
                            {!! Form::text('email', isset(\App\WebsiteInfo::all()->first()->email)? (\App\WebsiteInfo::all()->first()->email) : null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('image', 'Upload Logo:') !!}
                            {!! Form::file('image',null) !!}
                        </div>

                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}


            </div>
        </div>
</div>
@endsection