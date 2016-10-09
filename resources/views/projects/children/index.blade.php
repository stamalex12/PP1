<h2>Children</h2>
<div class="row">
    <div class="col-md-12">
        @foreach($children as $child)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default child-placeholder">
                    {{ Html::image($child->image, 'alt', ['class' => 'child-image-placeholder']) }}
                    <div class="child-content">
                        <p><b>{{$child->name}}</b> -  Aged {{$child->age}}<br/><br/>
                            {{$child->aspirations}}
                           </p>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
