@extends('layouts.master')

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h2>Booking #{{ $roombooking->id }} <small>booked by {{ $roombooking->firstName }} {{ $roombooking->lastName }}</small></h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Time: </h3>
            <p>    {{ date("g:ia\, jS M Y", strtotime($roombooking->startDate)) . ' until ' . date("g:ia\, jS M Y", strtotime($roombooking->endDate)) }}
            </p>

            <h3>Duration: </h3>
             <p>   {{ $duration }}
             </p>

            <p>
            <form action="{{ url('roombooking/' . $roombooking->id) }}" style="display:inline;" method="POST">
                <input type="hidden" name="_method" value="DELETE" />
                {{ csrf_field() }}
                <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </form>
            <a class="btn btn-primary" href="{{ url('roombooking/' . $roombooking->id . '/edit')}}">
                <span class="glyphicon glyphicon-edit"></span> Edit</a>

            </p>

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