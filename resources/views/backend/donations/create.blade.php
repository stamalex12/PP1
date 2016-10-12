@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Record a Donation</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/donations') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="amount" class="col-md-4 control-label">Amount</label>
                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control" name="amount"
                                           value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="resourceOrChild" class="col-md-4 control-label">Linked resource Need or
                                    Child</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="resourceOrChild">
                                        <option value="none">None</option>
                                        @foreach (\App\resourceNeed::all() as $resource) {
                                        <option value="{{$resource->name}}">{{$resource->name}}</option>@endforeach
                                        @foreach (\App\child::all() as $child) {
                                        <option value="{{$child->name}}">{{$child->name}}</option>@endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user" class="col-md-4 control-label">User</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="user">
                                        <option value="none">Anonymous</option>
                                        @foreach (\App\User::all() as $user) {
                                        <option value="{{$user->id}}">{{$user->name}}</option>@endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        submit
                                    </button>
                                    <a href="../donations" class=" btn btn-primary btn-raised">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
