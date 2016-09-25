    <div class="text-inter">
        <div class="container">
            <h2>Resource Needs</h2>
            @foreach($resources as $resource)
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{$resource->name}}</h3>
                        <p>{{$resource->description}}</p>
                        <p>Amount Needed: {{$resource->amountNeeded}}</p>
                        <div class="divider"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>