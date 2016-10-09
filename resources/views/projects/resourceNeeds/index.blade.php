
<h2>Resource Needs</h2>
@foreach($resources as $donatable)
    <div class="col-sm-12 col-md-8 col-md-offset-2 col-xs-12" style="margin-bottom: 7%;">
        <div class="panel panel-default ">
            <div class="row">
                @if(file_exists(public_path() . $donatable->imagePath) && $donatable->imagePath != "")
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >{{ Html::image($donatable->imagePath) }}</div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 details" style="padding-bottom: 8%; position: relative;">
                @else
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 details" style="padding-bottom: 8%; position: relative;">
                @endif
                    <h3 style="padding-top: 0;">{{$donatable->name}}</h3>
                    <p>{{$donatable->description}}</p>
                    <p>Amount Needed: {{$donatable->amountNeeded}}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-offset-6">
                    <div class="btn btn-primary btn-lg btn-block donate-btn">Donate</div>
                </div>
            </div>
        </div>
        <div class=" col-lg-10 col-sm-12 col-md-12 col-xs-12 col-md-offset-1 donation" style="display: none;">
            @if(Auth::check())
                @include('projects.detail')
            @else
                <p><b>You need to be logged in to make a donation.</b></p>
                <p>Please log in or register.</p>
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @include('projects.success')
    </div>
@endforeach
