@extends('layouts.master')

@section('content')


    @include('message')

    <div class="row">
        <div class="col-lg-6">

            <form action="{{ url('roombooking') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group @if($errors->has('firstName')) has-error has-feedback @endif">
                    <label for="firstName">Your First Name</label>
                    <input type="text" class="form-control" name="firstName" placeholder="First Name" value="{{ old('firstName') }}">
                    @if ($errors->has('name'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            {{ $errors->first('firstName') }}
                        </p>
                    @endif
                </div>

                <div class="form-group @if($errors->has('lastName')) has-error has-feedback @endif">
                    <label for="lastName">Your Last Name</label>
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}">
                    @if ($errors->has('lastName'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            {{ $errors->first('lastName') }}
                        </p>
                    @endif
                </div>

                <div class="form-group @if($errors->has('roomId')) has-error has-feedback @endif">
                    <label for="roomId">Room</label>

                    <select id="roomId" name="roomId" class="form-control">
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>


                    @if ($errors->has('roomId'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                            {{ $errors->first('roomId') }}
                        </p>
                    @endif
                </div>
                <div class="form-group @if($errors->has('time')) has-error @endif">
                    <label for="time">Time</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="time" placeholder="Select your time" value="{{ old('time') }}">
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
                "minDate": moment('<?php echo date('Y-m-d G')?>'),
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