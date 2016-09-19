    <div class="text-inter">
        <div class="container">
            <h2>Resource Needs</h2>
            @foreach($resources as $resource)
                <div class="row">
                    <div class="panel panel-default col-sm-12 col-md-8 col-md-offset-2 col-xs-12">
                        <div class="row">
                            <div class="col-md-6" style="padding-left: 0px;">{{ Html::image($resource->imagePath) }}</div>

                            <div class="col-md-6">
                                <h3>{{$resource->name}}</h3>
                                <p>{{$resource->description}}</p>
                                <p>Amount Needed: {{$resource->amountNeeded}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>