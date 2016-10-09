@extends('layouts.master')
@if(\App\System::all()->first()->slider == 1)
@section('slider')
    <div class="slider-wrapper">
        <div class="slider_container">
            <div class="flexslider">
                <ul class="slides">
                    @foreach(\App\Slider::where('status', "=", 'Active')->orderBy('sortOrder', 'ASC')->get() as $slider)
                    <li>
                        <a href="#"><img src="{{$slider->image}}" alt="" title=""/></a>
                        @if($slider->title != null || $slider->description != null)
                        <div class="flex-caption">
                            <div class="caption_title_line">
                                @if($slider->title != null)
                                <h2>{{$slider->title}}</h2>
                                @endif
                                @if($slider->description != null)
                                <p>{{$slider->description}}</p>
                                    @endif
                            </div>
                        </div>
                            @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@endif
@section('content')

    @foreach($content as $contents)
        <div class="row">
            <div class="col-md-12">
                @if($contents->type == 'information')
                    <h3>{{$contents->title}}</h3>
                    @if($contents->image == null)
                        <div class="col-md-12">
                            <p>{!! $contents->content !!}</p>
                        </div>
                    @else
                        <div class="col-md-3">
                            <div class="content-image">{{ Html::image($contents->image) }}</div>
                        </div>
                        <div class="col-md-9">
                            <p>{!! $contents->content!!}</p>
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
