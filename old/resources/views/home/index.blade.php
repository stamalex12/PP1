@extends('layouts.master')
@section('slider')
    <div class="slider-wrapper">
        <div class="slider_container">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <a href="#"><img src="img/children.jpg" alt="" title="" /></a>
                        <div class="flex-caption">
                            <div class="caption_title_line">
                                <h2>The Children</h2>
                                <p>Our mission is to help the children by allowing them to be able to get an education. With your help, we can make this happen.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="img/facility.jpg" alt="" title="" /></a>
                        <div class="flex-caption">
                            <div class="caption_title_line">
                                <h2>Facilities</h2>
                                <p>The facilities that can be provided are more than exceptional. With heating, air conditioning and plenty more features the children will be happy.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="img/volunteer.jpg" alt="" title="" /></a>
                        <div class="flex-caption">
                            <div class="caption_title_line">
                                <h2>Volunteer</h2>
                                <p>At Wesley, we are looking for volunteers that are willing to help with providing specific services such as teaching English, Programming skills, or other skills that will allow the beneficiaries to be gainfully employed.</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="text-inter">
        <div class="container">
            @foreach($content as $contents)
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{$contents->title}}</h3>
                        <p>{!! $contents->content !!}</p>
                        <div class="divider"></div>
                    </div>
                </div>

           {{-- <div class="row">
                <div class="col-md-12">
                    <h3>Wesley Mission</h3>
                    <p>Wesley Mission is an organisation that supports Oprhans. With your help, we can provide food, shelter and get them job ready.
                        We are looking for volunteers that would like to help these kids by teaching them skills such as English, programming skills or any relevant skills
                        that would benefit them in their future careers. Even just a small donation by you will significantly help these children.
                    </p>
                    <div class="divider"></div>
                </div>
            </div>--}}
                @endforeach
        </div>
    </div>

@endsection
