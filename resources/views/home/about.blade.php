@extends('layouts.master')

@section('content')
    <h1>About</h1>

    @foreach($content as $contents)
        <div class="row">
            <div class="col-md-12">
                @if($contents->type == 'information')
                    <h3>{{$contents->title}}</h3>
                    @if($contents->image == null)
                        <div class="col-md-12">
                            <p>{!! nl2br(e($contents->content)) !!}</p>
                        </div>
                    @else
                        <div class="col-md-3">
                            <div class="content-image">{{ Html::image($contents->image) }}</div>
                        </div>
                        <div class="col-md-9">
                            <p>{!! nl2br(e($contents->content)) !!}</p>
                        </div>
                    @endif

                @else
                    <div class="col-md-12">
                        <h3>{{$contents->title}}</h3>
                        <div class="content-image-full">{{ Html::image($contents->image) }}</div>
                    </div>
                @endif
                <div class="divider"></div>
            </div>
        </div>
    @endforeach
@endsection
