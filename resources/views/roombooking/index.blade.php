@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                    <a class="btn btn-primary" href="{{ url('roombooking/create')}}">
                        <span class="glyphicon glyphicon-plus"></span> Create A New Booking</a>
                    <a class="btn btn-primary" href="{{ url('roombooking')}}">
                <span class="glyphicon glyphicon-th-large"></span> View My Bookings</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div id='calendar'></div>
        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function() {

            var base_url = '{{ url('/') }}';

            $('#calendar').fullCalendar({
                weekends: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: {
                    url: base_url + '/api',
                    error: function() {
                        alert("cannot load json");
                    }

                }
            });
        });
    </script>
@endsection