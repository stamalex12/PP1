@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Volunteer Application</h1>

            <div class="col-md-6 col-xs-12">
                <p><b>Name</b></p>
                <p>{{$user->name}}</p>
            </div>
            <div class="col-md-6 col-xs-12">
                <p><b>Task Name</b></p>
                <p>{{$application->taskName}}</p>
            </div>
            <div class="col-md-6 col-xs-12">
                <p><b>Phone Number</b></p>
                <p>{{$application->phone}}</p>
            </div>
            <div class="col-md-6 col-xs-12">
                <p><b>Email Address</b></p>
                <p>{{$application->email}}</p>
            </div>
            <div class="col-md-6 col-xs-12">
                <p><b>Skills</b></p>
                <p>{{$application->skillsAndQuals}}</p>
            </div>
            <div class="col-md-6 col-xs-12">
                <p><b>Start Date</b></p>
                <p>{{$application->startDate->format('dS F Y')}}</p>
            </div>
            <div class="col-md-6 col-xs-12">
                <p><b>End Date</b></p>
                <p>{{$application->endDate->format('dS F Y')}}</p>
            </div>
            <div class="col-md-6 col-xs-12">

                <p><b>Status</b></p>
                <p>{{$application->status}}</p>
            </div>

            @if($application->status == 'new')
                <div class="col-md-6 col-xs-12">
                    <p><b>Approve Application</b></p>
                    <p>{!! link_to_action('Admin\AdminApplicationsController@approve','Approve', $application->id) !!}</p>
                </div>
            @endif

            @if(!($application->files == null))
                <div class="col-md-6 col-xs-12">
                    <p>{!! link_to_action('Admin\AdminApplicationsController@download','Download Working With Children Check', $application->id) !!}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="divider"></div>
                    <a href="../applications" class="btn btn-default btn-raised">Back</a>
                </div>
            </div>

        </div>
    </div>
@endsection

