@section('title', 'Admin')
@section('path', 'Admin')

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>SiteManager - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- bootstrap table -->
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Custom styles -->
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <link href="css/xcharts.min.css" rel=" stylesheet">
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
</head>

<body>
<!-- container section start -->
    <section id="container" class="">
        <header class="header dark-bg">
            <!--logo start-->
            <a href="{{route('admin')}}" class="logo">Site <span class="lite">Manager</span></a>
            <!--logo end-->
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

        {{$users = \App\User::all()}}

        <div class="row" style="margin:auto; width:90%;">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h1>Utenti</h1>
                        </header>
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Cognome</th>
                                <th class="text-center">Tipo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class='clickable-row' data-href="">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->Name}}</td>
                                    <td>{{ $user->Surname}}</td>
                                    <td>{{ $user->type->Description}}</td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                    </section>
                </div>
        </div>
    </section>
</body>
</html>
