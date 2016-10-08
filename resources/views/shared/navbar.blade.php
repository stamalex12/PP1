<header class="clearfix">

    <div class="logo col-lg-3">
                @if (count(\App\WebsiteInfo::all()) && \App\WebsiteInfo::all()->first() != NULL && \App\WebsiteInfo::all()->first()->logofilepath != NULL )
                    {{ Html::image(\App\WebsiteInfo::all()->first()->logofilepath) }}
                @else
            <h2 class="logo-text">
                <div class="text-left">
                    @foreach(\App\WebsiteInfo::all()as $title)
                        {{$title->companyName}}
                    @endforeach
                    @if(count(\App\WebsiteInfo::all())==0)
                            My Organisation
                        @endif
                </div>
            </h2>
                @endif

    </div>
    <nav class="clearfix">
        <ul class="clearfix">
            <li>{!!link_to_action('PageController@index', 'Home') !!} </li>
            <li>{!!link_to_action('PageController@about', 'About') !!} </li>

            @if(\App\System::all()->first()->projects == 1)
                <li>{!!link_to_action('PageController@projects', 'Projects') !!} </li>
            @endif

            @if(\App\System::all()->first()->testimonies == 1)
                <li>{!!link_to_action('PageController@testimonies', 'Testimonies') !!} </li>
            @endif


            @if (Auth::check())
                @if(Auth::user()->hasRole('Admin'))
                    <li>{!!link_to_action('Admin\PageController@dashboard', 'Dashboard') !!} </li>
                     @elseif(Auth::user()->hasRole('Visitor'))
                    <li>{!!link_to_action('ProfileController@index', 'Profile') !!} </li>
                @elseif(Auth::user()->hasRole('Auditor'))
                    <li>{!!link_to_action('ReportController@generateReport', 'Reports') !!} </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu pull-right clearfix">
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