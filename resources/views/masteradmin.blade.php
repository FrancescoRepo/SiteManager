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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('css/bootstrap-theme.css')}}" rel="stylesheet"/>
    <!-- bootstrap table -->
    <link href="{{ asset('css/bootstrap-table.css')}}" rel="stylesheet"/>
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles -->
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/xcharts.min.css') }}" rel=" stylesheet"/>
    <link href="{{ asset('css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet"/>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
@include('layout.navbar')
@include('layout.sidebaradmin')

<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> @yield('path')</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ route('admin') }}">Home</a></li>
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
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js//bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<!-- nice scroll -->
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<!--script for this page only-->
<script src="{{ asset('js/calendar-custom.js') }}"></script>
<script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
<!-- custom select -->
<script src="{{ asset('js/jquery.customSelect.min.js') }}"></script>
<script src="{{ asset('assets/chart-master/Chart.js') }}"></script>

<!--custome script for all page-->
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- custom script for this page-->
<script src="{{ asset('js/sparkline-chart.js') }}"></script>
<script src="{{ asset('js/easy-pie-chart.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('js/xcharts.min.js') }}"></script>
<script src="{{ asset('js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('js/jquery.placeholder.min.js') }}"></script>
<script src="{{ asset('js/gdp-data.js') }}"></script>
<script src="{{ asset('js/morris.min.js') }}"></script>
<script src="{{ asset('js/sparklines.js') }}"></script>
<script src="{{ asset('js/charts.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

<script>
</script>

<script type="text/javascript">
    $('#editUserModal').on('show.bs.modal', function (e) {
        var user = e.relatedTarget.id.split("|");
        $('#editModalID').attr('value', user[0].trim());
        $('#editModalCF').attr('value', user[1].trim());
        $('#editModalName').attr('value', user[2].trim());
        $('#editModalSurname').attr('value', user[3].trim());
        $('#editModalSex').attr('value', user[4].trim());
        $('#editModalUsername').attr('value', user[5].trim());
        $('#editModalPassword').attr('value', user[6].trim());
        $('#editModalEmail').attr('value', user[7].trim());
        $('#editModalPhone').attr('value', user[8].trim());
        $('#editModalUsertype option').filter(function(){ return $.trim( $(this).text() ) == user[9].trim();}).attr('selected', true);
        $('#editModalCustomer option').filter(function(){ return $.trim( $(this).text() ) == user[10].trim();}).attr('selected', true);
    });

    $('#deleteUserModal').on('show.bs.modal', function(e) {
        var user = e.relatedTarget.id;
        $('#deleteModalID').attr('value', user);
    });


    $('#btnEditModalUser').click(function(e) {
        var ID = $('#editModalID').val();
        var Name = $('#editModalName').val();
        var Surname = $('#editModalSurname').val();
        var Sex = $('#editModalSex').val();
        var Username = $('#editModalUsername').val();
        var Password = $('#editModalPassword').val();
        var Email = $('#editModalEmail').val();
        var Phone = $('#editModalPhone').val();
        var Usertype = $('#editModalUsertype').val();
        var Client = $('#editModalCustomer').val();

        $.ajax({
            url: '{{ route('editUsers') }}',
            data: {
                _token: "{{ csrf_token() }}",
                id: ID,
                Name: Name,
                Surname : Surname,
                Sex: Sex,
                username: Username,
                password : Password,
                Email: Email,
                Phone: Phone,
                usertype_id: Usertype,
                client_id: Client
            },
            type: 'POST',
            success: function(data) {
                //console.log(data);
                location.reload();
            }
        });
    });

    $('#btnDeleteModalUser').click(function(e) {
        var ID = $('#deleteModalID').val();

        $.ajax({
            url: '{{ route('deleteUsers') }}',
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
