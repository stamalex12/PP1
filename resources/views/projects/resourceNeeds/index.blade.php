
            <h2>Resource Needs</h2>
            @foreach($resources as $resource)
                <div class="row">
                    <div class="panel panel-default col-sm-12 col-md-8 col-md-offset-2 col-xs-12">
                        <div class="row" style="position:relative;">
                            <div class="col-md-6" style="padding-left: 0; padding-right: 0;">{{ Html::image($resource->imagePath) }}</div>

                            <div class="col-md-6 col-md-offset-6 details">
                                <h3>{{$resource->name}}</h3>
                                <p>{{$resource->description}}</p>
                                <p>Amount Needed: {{$resource->amountNeeded}}</p>
                                <div class="btn btn-primary btn-lg btn-block donate-btn" id="donate-btn">Donate</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-xs-12 col-md-offset-2" id="donation" style="display: none;">
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
