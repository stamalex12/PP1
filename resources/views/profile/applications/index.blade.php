@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>My Applications</h1>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Task Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($applications as $application)

                    <tr>
                        <th>{{$application->taskName}}</th>
                        <th>{{$application->startDate}}</th>
                        <th>{{$application->endDate}}</th>
                        <th>{{$application->status}}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>

        </div>
    </div>
@endsection

