@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Donnations</h1>
            <a href="donations/create" class="btn btn-primary btn-raised">Create</a>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Donnor</th>
                    <th>Amount</th>
                    <th>Resource or Child</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Donnor</th>
                    <th>Amount</th>
                    <th>Resource or Child</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($donations as $donation)

                    <tr>
                        <th>@if($donation->user_id == 0) Anonymous @else {{App\User::where('id', '=', $donation->user_id)->first()->name}} @endif</th>
                        <th>{{$donation->amount}}</th>
                        <th>@if($donation->donatable_type == 'App\Child')  {{App\Child::where('id', '=', $donation->donatable_id)->first()->name}}@else {{App\ResourceNeed::where('id', '=', $donation->donatable_id)->first()->name}} @endif </th>
                        <th>{{$donation->status}}</th>
                        <th>@if($donation->status == 'Pending') {!! link_to_action('Admin\DonationsController@approve','Complete', $donation->id) !!} | @endif  {!! link_to_action('Admin\DonationsController@destroy','Remove', $donation->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

