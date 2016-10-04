@extends('layouts.master')
@section('title', 'Admin Control Panel')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Control Panel</h1>
            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div> @endif
            <div class="list-group">
                <div class="col-md-6 col-xs-12">
                    <div class="list-group-separator"></div>

                    <div class="list-group-item">
                        <div class="row-action-primary">
                            <i class="mdi-social-group"></i>
                        </div>
                        <div class="row-content">
                            <div class="action-secondary"><i class="mdi-material-info"></i></div>
                            <h4 class="list-group-item-heading">Volunteering</h4>
                            <a href="applications" class="btn btn-default btn-raised">View/change Applications</a>
                        </div>
                    </div>
                </div>

                <div class="list-group-separator"></div>
            </div>
        </div>
    </div>

@endsection
