@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Expenses</h1>
            <a href="expenses/create" class="btn btn-primary btn-raised">Create</a>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Amount Needed</th>
                    <th>Linked Resource</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Amount Needed</th>
                    <th>Linked Resource</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($expenses as $expense)

                    <tr>
                        <th>{{$expense->name}}</th>
                        <th>{{$expense->description}}</th>
                        <th>{{$expense->amount}}</th>
                        <th>{{$expense->resourceNeed}}</th>
                        <th>{!!link_to_action('Admin\ExpensesController@edit', 'Edit', $expense->id) !!} |{!! link_to_action('Admin\ExpensesController@destroy','Remove', $expense->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

