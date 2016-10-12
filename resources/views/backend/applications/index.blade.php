@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Volunteer Applications</h1>

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Volunteer</th>
                    <th>Task Name</th>
                    <th>Skills and Qualifications</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Volunteer</th>
                    <th>Task Name</th>
                    <th>Skills and Qualifications</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <th>{{$application->user_id}}</th>
                        <th>{{$application->taskName}}</th>
                        <th>{{$application->skillsAndQuals}}</th>
                        <th>{{$application->startDate}}</th>
                        <th>{{$application->endDate}}</th>
                        <th>{{$application->phone}}</th>
                        <th>{{$application->email}}</th>
                        <th>{{$application->status}}</th>
                        <th>@if($application->status == 'new') {!! link_to_action('Admin\AdminApplicationsController@approve','Approve', $application->id) !!} | @endif k</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

