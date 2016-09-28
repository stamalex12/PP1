@extends('layouts.master')

@section('content')
    <h1>Projects</h1>
    @if(\App\System::all()->first()->resourceneeds == 1)
        @include('projects/resourceNeeds.index')
    @endif
    @if(\App\System::all()->first()->volunteerprograms == 1)
        @include('projects/volunteeringNeeds.index')
    @endif
@endsection