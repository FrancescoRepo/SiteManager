@section('title', 'Home')
@section('path', 'Home')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icofn" href="img/favicon.png">

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
    <link href="{{ asset('css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet"/>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
@include('layout.navbar')
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
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<!-- nice scroll -->
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<!--script for this page only-->
<script src="{{ asset('js/jquery.rateit.min.js') }}"></script>

<!--custome script for all page-->
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- custom script for this page-->
<script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('js/jquery.placeholder.min.js') }}"></script>
<script src="{{ asset('js/morris.min.js') }}"></script>
<script src="{{ asset('js/charts.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

<script>
</script>

<script type="text/javascript">
    var rowSiteID = 0;
    var rowSensorID = 0;

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
                        console.log(data['data']);
                    } else {
                        $('#div_search_ok_result').css('display', 'block');
                        $(row).css('display', 'block');
                        $(table).bootstrapTable('destroy');
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

    $("#sensorsTable tr button").on('click', function(e){
        rowSensorID = ($(this).closest('td').parent()[0].sectionRowIndex);
    });

    $('#editSiteModal').on('show.bs.modal', function (e) {
        var site = e.relatedTarget.id.split("|");
        $('#editModalID').attr('value', site[0].trim());
        $('#editModalName').attr('value', site[1].trim());
        $('#editModalDescription').attr('value', site[2].trim());
        $('#editModalAddressID').attr('value', site[3].trim());
        $('#editModalStreet').attr('value', site[4].trim());
        $('#editModalStreetNumber').attr('value', site[5].trim());
        $('#editModalZipCode').attr('value', site[6].trim());
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
        $('#editModalMaxVal').attr('value', sensor[4].trim());
        $('#editModalMinVal').attr('value', sensor[5].trim());
        $('#editModalBrand option').filter(function(){ return $.trim( $(this).text() ) == sensor[6].trim();}).attr('selected', true);
        $('#editModalType option').filter(function(){ return $.trim( $(this).text() ) == sensor[7].trim();}).attr('selected', true)
    });

    $('#deleteSensorModal').on('show.bs.modal', function(e) {
        var sensor = e.relatedTarget.id;
        $('#deleteModalID').attr('value', sensor);
    });

    /*
        Modifica del Sito
     */
    $('#btnEditModalSite').click(function(e) {
        var ID = $('#editModalID').val();
        var Name = $('#editModalName').val();
        var Description = $('#editModalDescription').val();
        var AddressID = $('#editModalAddressID').val();
        var Street = $('#editModalStreet').val();
        var StreetNumber = $('#editModalStreetNumber').val();
        var ZipCode = $('#editModalZipCode').val();

        $.ajax({
           url: '{{ route('editSite') }}',
           data: {
               _token: "{{ csrf_token() }}",
               id: ID,
               Name: Name,
               Description : Description,
               AddressID: AddressID,
               Street: Street,
               StreetNumber: StreetNumber,
               ZipCode: ZipCode
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

    /*
        Eliminazione del sito
     */
    $('#btnDeleteModalSite').click(function(e) {
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

    /*
        Modifica del sensore
     */
    $('#btnEditModalSensor').click(function() {
        var ID = $('#editModalID').val();
        var Model = $('#editModalModel').val();
        var Latitude = $('#editModalLatitude').val();
        var Longitude = $('#editModalLongitude').val();
        var MaxVal = $('#editModalMaxVal').val();
        var MinVal = $('#editModalMinVal').val();
        var brand_id = $('#editModalBrand').val();
        var type_id = $('#editModalType').val();

        $.ajax({
            url: '{{ route('editSensor') }}',
            data: {
                _token: "{{ csrf_token() }}",
                id: ID,
                Model: Model,
                Latitude : Latitude,
                Longitude: Longitude,
                MaxValue: MaxVal,
                MinValue: MinVal,
                brand_id: brand_id,
                type_id: type_id
            },
            type: 'POST',
            success: function(data) {
                //console.log(data['data']);
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

    /*
     Eliminazione del sensore
     */
    $('#btnDeleteModalSensor').click(function(e) {
        var ID = $('#deleteModalID').val();

        $.ajax({
            url: '{{ route('deleteSensor') }}',
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
