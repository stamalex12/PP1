<h2>Children</h2>
<div class="row">
    <div class="col-md-12">
        @foreach($children as $donatable)
            <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 7%">
                <div class="panel panel-default child-placeholder" style="position:relative;">
                    @if($donatable->image)
                    {{ Html::image($donatable->image, 'alt', ['class' => 'child-image-placeholder']) }}
                    @endif
                    <div class="child-content">
                        <p><b>{{$donatable->name}}</b> -  Aged {{$donatable->age}}<br/><br/>
                            {{$donatable->aspirations}}
                           </p>
                        <div>
                            <div class="btn btn-primary btn-lg btn-block donate-btn donate-btn-child">Donate for {{$donatable->name}}</div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: none";>
                    <div class="col-sm-12 col-md-12 col-xs-12 donation">
                        @if(Auth::check())
                            @include('projects.detail')
                        @else
                            <p><b>You need to be logged in to make a donation.</b></p>
                            <p>Please log in or register.</p>
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
