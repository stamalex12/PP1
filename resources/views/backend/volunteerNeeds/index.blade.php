@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Resource Needs</h1>
            <a href="resources/create" class="btn btn-primary btn-raised">Create</a>

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Skills Needed</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Skills Needed</th>
                    <th>Status</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($volunteerNeeds as $volunteerNeed)

                    <tr>
                        <th>{{$volunteerNeed->name}}</th>
                        <th>{{$volunteerNeed->description}}</th>
                        <th>{{$volunteerNeed->startDate}}</th>
                        <th>{{$volunteerNeed->endDate}}</th>
                        <th>{{$volunteerNeed->skillNeeded}}</th>
                        <th>{!!link_to_action('Admin\VolunteerController@edit', 'Edit', $volunteerNeed->id) !!} |
                            @if($volunteerNeed->status == "Active")
                                {!! link_to_action('Admin\VolunteerController@statusToggle','Disable', $volunteerNeed->id) !!}
                            @else
                                {!! link_to_action('Admin\VolunteerController@statusToggle','Enable', $volunteerNeed->id) !!}
                            @endif
                            | {!! link_to_action('Admin\VolunteerController@destroy','Remove', $volunteerNeed->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>

@endsection

