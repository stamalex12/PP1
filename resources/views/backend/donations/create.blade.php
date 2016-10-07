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
                                <label for="name" class="col-md-4 control-label">Donnor Name</label>
                                <div class="col-md-6">
                                    <input id="donnor" type="text" class="form-control" name="donnorName" value="{{ old('name') }}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="amount" class="col-md-4 control-label">Amount</label>
                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control" name="amount" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="resourceNeed" class="col-md-4 control-label">Linked resource Need</label>
                                <select name="resourceNeed">
                                    <option value="none">None</option>
                                    @foreach (\App\resourceNeed::all() as $resource) {
                                    <option value= "{{$resource->id}}">{{$resource->name}}</option>@endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> submit
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
