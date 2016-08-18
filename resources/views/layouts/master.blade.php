<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/queries.css">
    <link rel="stylesheet" href="css/slider.css">

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='js/jquery.js'></script>
    <!-- FlexSlider -->
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" charset="utf-8">
        var $ = jQuery.noConflict();
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "fade"
            });

            $(function () {
                $('.show_menu').click(function () {
                    $('.menu').fadeIn();
                    $('.show_menu').fadeOut();
                    $('.hide_menu').fadeIn();
                });
                $('.hide_menu').click(function () {
                    $('.menu').fadeOut();
                    $('.show_menu').fadeIn();
                    $('.hide_menu').fadeOut();
                });
            });
        });
    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="clearfix">
    <div class="logo col-md-3">
        <h2 class="logo-text">WESLEY MISSION</h2>
    </div>
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="index.html">Home</a></li>
            <li><a href="projects.html">Projects</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </nav>
    <div class="pullcontainer">
        <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
    </div>
</header>
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



<div class="text-inter">
    <div class="container">
        @yield('content')
    </div>
</div>


<div class="shadow"></div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright 2016 All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/unslider.min.js"></script>
</body>
</html>
<!-- FlexSlider -->
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" charset="utf-8">
    var $ = jQuery.noConflict();
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "fade"
        });

        $(function () {
            $('.show_menu').click(function () {
                $('.menu').fadeIn();
                $('.show_menu').fadeOut();
                $('.hide_menu').fadeIn();
            });
            $('.hide_menu').click(function () {
                $('.menu').fadeOut();
                $('.show_menu').fadeIn();
                $('.hide_menu').fadeOut();
            });
        });
    });
</script>