@extends('layouts.master')

@section('content')
    @include('profile.sidebar')

    <div class="col-md-10"  style="border-left: 2px solid darkgrey;">
    <h1>Reports</h1>
    <div class="row">
        <div class="panel panel-default col-sm-12 col-md-12 col-xs-12">

        </div>
    </div>

    <div class="row">
        <div class="panel panel-default col-sm-12 col-md-12 col-xs-12">
            <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#monthly">Monthly Report</a></li>
                <li><a data-toggle="tab" href="#ie">Income/Expense Report</a></li>
            </ul>

            <div class="tab-content">
                <div id="monthly" class="tab-pane fade in active">
                    @if(Auth::user()->hasRole('Auditor'))
                        <a class="btn btn-primary btn-raised btn-padding" target="_blank" href="{{ url('/getMPDF') }}">View
                            PDF</a>
                        <a class="btn btn-primary btn-raised btn-padding" href="{{ url('/getMExport') }}">Export to
                            Excel</a>
                    @endif
                    @include('reports.monthly')
                </div>

                <div id="ie" class="tab-pane fade">
                    @if(Auth::user()->hasRole('Auditor'))
                        <a class="btn btn-primary btn-raised btn-padding" target="_blank" href="{{ url('/getIEPDF') }}">View
                            PDF</a>
                        <a class="btn btn-primary btn-raised btn-padding" href="{{ url('/getIEExport') }}">Export to
                            Excel</a>
                    @endif
                    @include('reports.incomeexpense')
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection