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
        //$('#editModalPassword').attr('value', user[6].trim());
        $('#editModalEmail').attr('value', user[6].trim());
        $('#editModalPhone').attr('value', user[7].trim());
        $('#editModalUsertype option').filter(function(){ return $.trim( $(this).text() ) == user[8].trim();}).attr('selected', true);
        $('#editModalCustomer option').filter(function(){ return $.trim( $(this).text() ) == user[9].trim();}).attr('selected', true);
    });

    $('#deleteUserModal').on('show.bs.modal', function(e) {
        var user = e.relatedTarget.id;
        $('#deleteModalID').attr('value', user);
    });

    $('#editClientModal').on('show.bs.modal', function (e) {
        var client = e.relatedTarget.id.split("|");
        $('#editModalID').attr('value', client[0].trim());
        $('#editModalPI').attr('value', client[1].trim());
        $('#editModalBusinessName').attr('value', client[2].trim());
    });

    $('#deleteClientModal').on('show.bs.modal', function(e) {
        var client = e.relatedTarget.id;
        $('#deleteModalID').attr('value', client);
    });

    $('#editSiteModal').on('show.bs.modal', function (e) {
        var site = e.relatedTarget.id.split("|");
        $('#editModalID').attr('value', site[0].trim());
        $('#editModalName').attr('value', site[1].trim());
        $('#editModalDescription').attr('value', site[2].trim());
        $('#editModalAddressID').attr('value', site[3].trim());
        $('#editModalStreet').attr('value', site[4].trim());
        $('#editModalStreetNumber').attr('value', site[5].trim());
        $('#editModalProvince').attr('value', site[6].trim());
    });

    $('#deleteSiteModal').on('show.bs.modal', function(e) {
        var site = e.relatedTarget.id;
        $('#deleteModalID').attr('value', site);
    });

    $('#editSensorModal').on('show.bs.modal', function (e) {
        var sensor = e.relatedTarget.id.split("|");
        $('#editModalID').attr('value', sensor[0].trim());
        $('#editModalModel').attr('value', sensor[1].trim());
        $('#editModalLatitude').attr('value', sensor[2].trim());
        $('#editModalLongitude').attr('value', sensor[3].trim());
        $('#editModalValMax').attr('value', sensor[4].trim());
        $('#editModalValMin').attr('value', sensor[5].trim());
        $('#editModalSite option').filter(function(){ return $.trim( $(this).text() ) == sensor[6].trim();}).attr('selected', true);
        $('#editModalBrand option').filter(function(){ return $.trim( $(this).text() ) == sensor[7].trim();}).attr('selected', true);
        $('#editModalType option').filter(function(){ return $.trim( $(this).text() ) == sensor[8].trim();}).attr('selected', true);
    });

    $('#deleteSensorModal').on('show.bs.modal', function(e) {
        var sensor = e.relatedTarget.id;
        $('#deleteModalID').attr('value', sensor);
    });

    /*
        Modifica utenti
     */
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
            url: '{{ route('edit', 'user') }}',
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
                client_id: Client,

            },
            type: 'POST',
            success: function(data) {
                //console.log(data);
                location.reload();
            }
        });
    });

    /*
        Cancellazione utenti
     */
    $('#btnDeleteModalUser').click(function(e) {
        var ID = $('#deleteModalID').val();

        $.ajax({
            url: '{{ route('delete', 'user') }}',
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

    /*
        Modifica clienti
     */
    $('#btnEditModalClient').click(function(e) {
        var ID = $('#editModalID').val();
        var PI = $('#editModalPI').val();
        var BusinessName = $('#editModalBusinessName').val();

        $.ajax({
            url: '{{route('edit', 'client') }}',
            data: {
                _token: "{{ csrf_token() }}",
                id: ID,
                PI: PI,
                BusinessName: BusinessName
            },
            type: 'POST',
            success: function(data) {
                //console.log(data);
                location.reload();
            }
        });
    });

    /*
     Cancellazione clienti
     */
    $('#btnDeleteModalClient').click(function(e) {
        var ID = $('#deleteModalID').val();

        $.ajax({
            url: '{{ route('delete', 'client') }}',
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

    /*
        Modifica Siti
     */
    $('#btnEditModalSite').click(function(e) {
        var ID = $('#editModalID').val();
        var Name = $('#editModalName').val();
        var Description = $('#editModalDescription').val();
        var AddressID = $('#editModalAddressID').val();
        var Street = $('#editModalStreet').val();
        var StreetNumber = $('#editModalStreetNumber').val();
        var Province = $('#editModalProvince').val();
        var users_id = [];

        $(':checkbox:checked').each(function(i){
            users_id[i] = $(this).val();
        });

        $.ajax({
            url: '{{route('edit', 'site') }}',
            data: {
                _token: "{{ csrf_token() }}",
                id: ID,
                Name: Name,
                Description: Description,
                AddressID: AddressID,
                Street: Street,
                StreetNumber: StreetNumber,
                Province: Province,
                users_id: users_id
            },
            type: 'POST',
            success: function(data) {
                //console.log(data);
                location.reload();
            }
        });
    });

    /*
     Cancellazione Siti
     */
    $('#btnDeleteModalSite').click(function(e) {
        var ID = $('#deleteModalID').val();

        $.ajax({
            url: '{{ route('delete', 'site') }}',
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

    /*
        Modifica Sensori
     */
    $('#btnEditModalSensor').click(function(e) {
        var ID = $('#editModalID').val();
        var Model = $('#editModalModel').val();
        var Latitude = $('#editModalLatitude').val();
        var Longitude = $('#editModalLongitude').val();
        var MaxValue = $('#editModalMaxVal').val();
        var MinValue = $('#editModalMinVal').val();
        var site_id = $('#editModalSite').val();
        var brand_id = $('#editModalBrand').val();
        var type_id = $('#editModalType').val();

        $.ajax({
            url: '{{route('edit', 'sensor') }}',
            data: {
                _token: "{{ csrf_token() }}",
                id: ID,
                Model: Model,
                Latitude: Latitude,
                Longitude: Longitude,
                MaxValue: MaxValue,
                MinValue: MinValue,
                site_id: site_id,
                brand_id: brand_id,
                type_id: type_id
            },
            type: 'POST',
            success: function(data) {
                //console.log(data);
                location.reload();
            }
        });
    });

    /*
        Cancellazione Sensori
     */
    $('#btnDeleteModalSensor').click(function(e) {
        var ID = $('#deleteModalID').val();

        $.ajax({
            url: '{{ route('delete', 'sensor') }}',
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
