@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Donnations</h1>
            <a href="donations/create" class="btn btn-primary btn-raised">Create</a>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Donnor Name</th>
                    <th>Amount</th>
                    <th>Linked Resource</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Donnor Name</th>
                    <th>Amount Needed</th>
                    <th>Linked Resource</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($donations as $donation)

                    <tr>
                        <th>{{$donation->donnorName}}</th>
                        <th>{{$donation->amount}}</th>
                        <th>{{$donation->resourceNeed}}</th>
                        <th>{!! link_to_action('Admin\DonationsController@destroy','Remove', $donation->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

