@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create an Expense</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/expenses') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="amount" class="col-md-4 control-label">Amount</label>
                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control" name="amount" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="resourNeed" class="col-md-4 control-label">Linked resource Need</label>
                                <select name="resourceNeed">
                                    <option value="none">None</option>
                                    @foreach (\App\resourceNeed::all() as $resource) {
                                    <option value= "{{$resource->name}}">{{$resource->name}}</option>@endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> submit*
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
