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
                    <th>Volunteer</th>
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

                        <th>{{\App\User::find($application->user_id)->name}}</th>
                        <th>{{$application->taskName}}</th>
                        <th>{{$application->skillsAndQuals}}</th>
                        <th>{{$application->startDate->format('dS M Y')}}</th>
                        <th>{{$application->endDate->format('dS M Y')}}</th>
                        <th>{{$application->phone}}</th>
                        <th>{{$application->email}}</th>
                        <th>{{$application->status}}</th>
                        <th>@if($application->files !="") Yes @endif</th>
                        <th>
                            @if($application->status == 'new')
                                {!! link_to_action('Admin\AdminApplicationsController@approve','Approve', $application->id) !!}
                                |
                            @endif
                            @if($application->files !="")
                                {!! link_to_action('Admin\AdminApplicationsController@download','Download WWC', $application->id) !!}
                                |
                            @endif
                            {!! link_to_action('Admin\AdminApplicationsController@show','View', $application->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

