@extends('layouts.master')

@section('content')
    <h1>Reports</h1>
    <div class="row">
        <div class="panel panel-default col-sm-12 col-md-12 col-xs-12">
            @include('reports.incomeexpense')
        </div>
    </div>
@endsection