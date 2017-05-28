@section('title', 'Home')
@section('path', 'Home')

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
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                        class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="{{route('welcome')}}" class="logo">Site <span class="lite">Manager</span></a>
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

@include('layout.sidebar')

<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> @yield('path')</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                        <li><i class="fa fa-laptop"></i>@yield('path')</li>
                    </ol>
                </div>
            </div>

            @yield('content')

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

<script>
</script>

<script type="text/javascript">
    var rowSiteID = 0;

    $(document).ready(function () {
        //Inserire funzioni eventuali quando si carica la pagina
    });

    $("input[name='optRadio']").change(function () {
        var filter = $("input[name='optRadio']:checked").val();
        if(filter == "Sito") {
            $('#txtSearch').attr('placeholder', 'Cerca sito per Nome');
        } else if(filter == "Sensore") {
            $('#txtSearch').attr('placeholder', 'Cerca sensore per Modello');
        } else {
            $('#txtSearch').attr('placeholder', 'Cerca utente per Nome o Cognome');
        }
    });

    $('#btnSearch').click(function () {
        var filter = $("input[name='optRadio']:checked").val();
        var text = $('#txtSearch').val();
        var route;
        var table;
        var row;
        $('#div_search_no_result').css('display', 'none');
        $('#div_search_ok_result').css('display', 'none');
        $('#row_table_sites').css('display', 'none');
        $('#row_table_users').css('display', 'none');
        $('#row_table_sensors').css('display', 'none');

        if(text.trim() == "") {
            alert("Inserire un termine di ricerca");
        } else {
            if(filter == "Sito")
            {
                route = "{{ route('searchSites') }}";
                row = '#row_table_sites';
                table = '#sites_table';
            }
            else if(filter == "Utente")
            {
                route = "{{ route('searchUsers') }}";
                row = '#row_table_users';
                table = '#users_table';
            }
            else
            {
                route = "{{ route('searchSensors') }}";
                row = '#row_table_sensors';
                table = '#sensors_table';
            }

            $.ajax({
                url: route,
                data: {
                    _token: "{{ csrf_token() }}",
                    text: text,
                    filter: filter
                },
                type: 'POST',
                success: function (data) {
                    if(data['data'].length == 0) {
                        $('#div_search_no_result').css('display', 'block');
                    } else {
                        $('#div_search_ok_result').css('display', 'block');
                        $(row).css('display', 'block');
                        $(table).bootstrapTable({
                            data: data['data']
                        });
                    }
                },
                error: function (data) {
                }
            });
        }
    });

    $("#sitesTable tr button").on('click', function(e){
        rowSiteID = ($(this).closest('td').parent()[0].sectionRowIndex);
    });

    $('#editSiteModal').on('show.bs.modal', function (e) {
        var site = e.relatedTarget.id.split("|");
        $('#editModalID').attr('value', site[0].trim());
        $('#editModalName').attr('value', site[1].trim());
        $('#editModalDescription').attr('value', site[2].trim());
    });

    $('#deleteSiteModal').on('show.bs.modal', function(e) {
        var site = e.relatedTarget.id;
        $('#deleteModalID').attr('value', site);
    });


    $('#btnEditModal').click(function(e) {
        var ID = $('#editModalID').val();
        var Name = $('#editModalName').val();
        var Description = $('#editModalDescription').val();

        $.ajax({
           url: '{{ route('editSite') }}',
           data: {
               _token: "{{ csrf_token() }}",
               id: ID,
               Name: Name,
               Description : Description
           },
           type: 'POST',
           success: function(data) {
               location.reload();

               //Capire come poter aggiornare la riga mantenendo il link
               /*console.log(data['data']);
               console.log(data['data']['Name']);
                $('#sitesTable').bootstrapTable('updateRow', {
                    index: rowSiteID,
                    row: {
                        Name: data['data']['Name'],
                        Description: data['data']['Description']
                    }
                });*/
           }
        });
    });

    $('#btnDeleteModal').click(function(e) {
       var ID = $('#deleteModalID').val();

       $.ajax({
            url: '{{ route('deleteSite') }}',
            data: {
                _token: "{{ csrf_token() }}",
                id: ID,
            },
           type: 'POST',
           success: function(data) {
                location.reload();
           }
       });
    });

</script>
</body>
</html>
