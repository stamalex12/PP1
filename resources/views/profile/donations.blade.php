@extends('layouts.master')

@section('content')
    @include('profile.sidebar')

    <div class="col-md-10"  style="border-left: 2px solid darkgrey;">
    <div class="row">
        <div class="col-md-12">
            <h1>My Donations</h1>
            <table id="example" class="display table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date of Donation</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date of Donation</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($donations as $donation)
                    @if($donation->status == 'Pending')
                        <tr class="active">
                    @elseif($donation->status == 'Complete')
                        <tr class="success">
                    @else
                        <tr class="warning">
                    @endif
                        @if($donation->donatable_type == 'App\ResourceNeed')
                            <td>Resource</td>
                        @else
                            <td>Child</td>
                        @endif
                        <td>{{$donation->donatable->name}}</td>
                        <td>{{$donation->amount}}</td>
                        <td>{{$donation->status}}</td>
                        <td>{{$donation->created_at->format('d/m/Y')}}</td>
                        <td>@if($donation->status == 'Pending')
                                {!! link_to_action('ProfileController@cancelDonation','Cancel', $donation->id) !!}
                            @elseif($donation->status == 'Cancelled')
                                {!! link_to_action('ProfileController@recoverDonation','Recover', $donation->id) !!}
                            @endif
                            @if($donation->status != 'Complete')
                            |   {!! link_to_action('ProfileController@deleteDonation','Delete', $donation->id) !!}
                            @endif
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>

        </div>
    </div>
    </div>
@endsection