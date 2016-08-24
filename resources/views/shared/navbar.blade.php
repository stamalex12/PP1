<header class="clearfix">
    <div class="logo col-md-3">
        <h2 class="logo-text">WESLEY MISSION</h2>
    </div>
    <nav class="clearfix">
        <ul class="clearfix">
            <li>{!!link_to_action('PageController@index', 'Home') !!} </li>
            <li>{!!link_to_action('PageController@about', 'About') !!} </li>
            <li>{!!link_to_action('ContentController@index', 'Content') !!} </li>
           {{-- <li><a href="index.html">Home</a></li>
            <li><a href="projects.html">Projects</a></li>
            <li><a href="login.html">Login</a></li>--}}
        </ul>
    </nav>
    <div class="pullcontainer">
        <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
    </div>
</header>