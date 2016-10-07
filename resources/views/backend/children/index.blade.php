@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Children</h1>
            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div> @endif
            <a href="children/create" class="btn btn-primary btn-raised">Create</a>

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Aspirations</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Aspirations</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($children as $childs)

                    <tr>
                        <th>{{$childs->name}}</th>
                        <th>{{$childs->age}}</th>
                        <th>{{$childs->gender}}</th>
                        <th>{{$childs->aspirations}}</th>
                        <th>{{$childs->image}}</th>


                        <th>{!!link_to_action('Admin\ChildrenController@edit', 'Edit', $childs->id) !!}

                            | {!! link_to_action('Admin\ChildrenController@destroy','Remove', $childs->id) !!}</th>
                    </tr>

                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="{{ action("Admin\PageController@dashboard") }}" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

