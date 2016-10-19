
        <h2>Volunteering Programs</h2>
        @foreach($volunteerNeeds as $volunteerNeed)
            <div class="row">
                <div class="panel panel-default col-sm-12 col-md-8 col-md-offset-2 col-xs-12">
                    <div class="row">
                        <div class="col-md-6" style="padding-left: 0px;">{{ Html::image($volunteerNeed->imagePath) }}</div>

                        <div class="col-md-6">
                            <h3>{{$volunteerNeed->name}}</h3>
                            <p>{{$volunteerNeed->description}}</p>
                            <p>Skills Needed: {{$volunteerNeed->skillsNeeded}}</p>
                            <p>Start Date: {{$volunteerNeed->startDate->format('dS F Y')}}</p>
                            <p>End Date: {{$volunteerNeed->endDate->format('dS F Y')}}</p>
                        </div>
                        @if (Auth::check())
                            {!! link_to_action('ApplicationsController@create','Apply', $volunteerNeed->id, ['class' =>'btn btn-primary btn-raised']) !!}
                        @else
                            Interested in helping out? <a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a>.
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
