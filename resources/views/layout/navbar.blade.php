<header class="header dark-bg">
    @if(Auth::user()->usertype_id != 1)
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                        class="icon_menu"></i></div>
        </div>
    @endif
    <!--logo start-->
        @if(Auth::user()->usertype_id != 1){
    <a href="{{route('welcome')}}" class="logo">Site <span class="lite">Manager</span></a>
    <!--logo end-->
    }@else
            <a href="{{route('admin')}}" class="logo">Site <span class="lite">Manager</span></a>
     @endif
    <div class="top-nav notification-row">
        <!-- notification dropdown start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                    <span class="username">{{ Auth::user()->Name }} {{ Auth::user()->Surname }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="{{ route('account') }}"><i class="icon_profile"></i> Il mio Profilo</a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}"><i class="icon_key_alt"></i> Log Out</a>
                    </li>

                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>
<!--header end-->