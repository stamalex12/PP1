
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
                            <p>Start Date: {{$volunteerNeed->startDate}}</p>
                            <p>End Date: {{$volunteerNeed->endDate}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
