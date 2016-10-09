@extends('layouts.master')

@section('content')
    <h1>Projects</h1>
    @include('projects/resourceNeeds.index')
    @include('projects/volunteeringNeeds.index')
@endsection