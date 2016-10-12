@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-lg-6">

            @if($errors)
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif

            <form action="{{ url('admin/roombooking/' . $roombooking->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group ">
                    <label for="firstName"> First Name</label>
                    <input type="text" class="form-control" name="firstName" value="{{ $roombooking->firstName }}" >
                    @if ($errors->has('firstName'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            {{ $errors->first('firstName') }}
                        </p>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="lastName"> Last Name</label>
                    <input type="text" class="form-control" name="lastName" value="{{ $roombooking->lastName }}" >
                    @if ($errors->has('lastName'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            {{ $errors->first('lastName') }}
                        </p>
                    @endif
                </div>


                <div class="form-group ">
                    <label for="time">Time</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="time" value="{{ $roombooking->startDate . ' - ' . $roombooking->endDate }}" placeholder="Select your time">
                        <span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                    @if ($errors->has('time'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            {{ $errors->first('time') }}
                        </p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{URL::asset('js/daterangepicker.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('input[name="time"]').daterangepicker({
                "timePicker": true,
                "timePicker24Hour": true,
                "timePickerIncrement": 15,
                "autoApply": true,
                "locale": {
                    "format": "DD/MM/YYYY HH:mm:ss",
                    "separator": " - ",
                }
            });
        });
    </script>
@endsection