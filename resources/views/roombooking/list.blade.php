@extends('layouts.master')

@section('content')

{{--admin can check the whole list of bookings--}}
    <div class="row">
        <div class="col-lg-12">
            <h1>My Bookings</h1>
            @if($roombooking->count() > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>Booking Id</th>
                        <th>Room</th>
                        {{--<th>Guest Name</th>--}}
                        <th>Start</th>
                        <th>End</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i = 1;?>
                    @foreach($roombooking as $booking)
                        <tr>

                            <td><a href="{{ url('roombooking/' . $booking->id) }}">{{ $booking->id }}</a></td>
                            <td>{{\App\Room::where('id', $booking->roomId)->first()->name }}</td>
                            <td>{{ date("g:ia\, jS M Y", strtotime($booking->startDate)) }}</td>
                            <td>{{date("g:ia\, jS M Y", strtotime($booking->endDate)) }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{ url('roombooking/' . $booking->id . '/edit')}}">
                                    <span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <form action="{{ url('roombooking/' . $booking->id) }}" style="display:inline" method="POST">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2>No event yet!</h2>
            @endif
            <a href="booking" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection
