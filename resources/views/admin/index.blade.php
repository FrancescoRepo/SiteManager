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
@include('layout.navbar')

<!--main content start-->
    <section id="main-content-admin">
        <section class="wrapperadmin">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Utenti
                        </header>
                        @foreach($customers as $customer)
                            <header class="panel-heading">
                                <b>{{$client = $customer->BusinessName}}</b>
                            </header>
                            <table class=" table text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">CF</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Cognome</th>
                                    <th class="text-center">Sesso</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Tipo</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        @if($user->client->BusinessName==$client)
                                            <tr>
                                                <th class="text-center">{{$user->id}}</th>
                                                <th class="text-center">{{$user->CF}}</th>
                                                <th class="text-center">{{$user->Name}}</th>
                                                <th class="text-center">{{$user->Surname}}</th>
                                                <th class="text-center">{{$user->Sex}}</th>
                                                <th class="text-center">{{$user->username}}</th>
                                                <th class="text-center">{{$user->usertype->Description}}</th>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                            </table>
                        @endforeach
                    </section>
                </div>
            </div>

        </section>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->


<!-- javascripts -->
<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.10.4.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<script src="js//bootstrap-toggle.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/owl.carousel.js"></script>
<!--script for this page only-->
<script src="js/calendar-custom.js"></script>
<script src="js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="js/jquery.customSelect.min.js"></script>
<script src="assets/chart-master/Chart.js"></script>

<!--custome script for all page-->
<script src="js/scripts.js"></script>
<!-- custom script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/xcharts.min.js"></script>
<script src="js/jquery.autosize.min.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script src="js/gdp-data.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/sparklines.js"></script>
<script src="js/charts.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>

</body>
</html>

