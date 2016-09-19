<header class="clearfix">
    <div class="logo col-md-3">
        <h2 class="logo-text">WESLEY MISSION</h2>
    </div>
    <nav class="clearfix">
        <ul class="clearfix">
            <li>{!!link_to_action('PageController@index', 'Home') !!} </li>
            <li>{!!link_to_action('PageController@about', 'About') !!} </li>
            <li>{!!link_to_action('PageController@projects', 'Projects') !!} </li>
            <li>{!!link_to_action('PageController@testimonies', 'Testimonies') !!} </li>


            @if (Auth::check())
                @if(Auth::user()->hasRole('Admin'))
                    <li>{!!link_to_action('Admin\PageController@dashboard', 'Dashboard') !!} </li>
                @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu clearfix">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @endif
        </ul>
    </nav>
    <div class="pullcontainer">
        <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
    </div>
</header>