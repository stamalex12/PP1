@extends('layouts.master')

@section('content')
    <h1>Projects</h1>
    <ul class="nav nav-tabs">

        @if(\App\System::all()->first()->resourceneeds == 1)
            <li><a data-toggle="tab" href="#resource">Recource Needs</a></li>
        @endif
        @if(\App\System::all()->first()->volunteerprograms == 1)
            <li><a data-toggle="tab" href="#volunteer">Volunteer Needs</a></li>
        @endif
        @if(\App\System::all()->first()->childdetails == 1)
            <li><a data-toggle="tab" href="#children">Children</a></li>
        @endif
    </ul>

    <div class="tab-content">
        @if(\App\System::all()->first()->resourceneeds == 1)
            <div id="resource" class="tab-pane fade in active">

                @include('projects/resourceNeeds.index')
            </div>
        @endif
        @if(\App\System::all()->first()->volunteerprograms == 1)
            <div id="volunteer" class="tab-pane fade">
                @include('projects/volunteeringNeeds.index')
            </div>
        @endif
        @if(\App\System::all()->first()->childdetails == 1)
            <div id="children" class="tab-pane fade">

            </div>
        @endif
    </div>

@endsection