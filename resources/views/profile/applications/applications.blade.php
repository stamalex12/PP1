@extends('layouts.master')

@section('content')
    @include('profile.sidebar')

    <div class="col-md-10"  style="border-left: 2px solid darkgrey;">
        <div class="row">
            <div class="col-md-12">
                <h1>My Volunteering</h1>
                <table id="example" class="display table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Skills</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>wwc</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Task Name</th>
                        <th>Skills</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>wwc</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($applications as $application)
                            <tr>
                                <th>{{$application->taskName}}</th>
                                <th>{{$application->skillsAndQuals}}</th>
                                <th>{{$application->startDate}}</th>
                                <th>{{$application->endDate}}</th>
                                <th>{{$application->phone}}</th>
                                <th>{{$application->email}}</th>
                                <th>{{$application->status}}</th>
                                <th>@if($application->files !="") Yes @endif</th>
                                <th>@if($application->status == 'new') {!! link_to_action('ApplicationsController@cancel','Cancel', $application->id) !!}@endif</th>

                            </tr>
                            @endforeach


                    </tbody>
                </table>
                <div class="divider"></div>
                <a href="dashboard" class="btn btn-default btn-raised">Back</a>
            </div>
        </div>
    </div>
@endsection