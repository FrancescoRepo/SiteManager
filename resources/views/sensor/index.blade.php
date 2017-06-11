@section('title', 'Siti')
@section('path', 'Siti')

@extends('master')

@section('content')

    <!-- Dashboard start -->
    <div class="raw">
        <div class="col-lg-12">
            <div class="alert-panel">
                <div class="alert-panel-heading"><strong>ERRORI RILEVATI</strong></div>
                <div class="alert-panel-content">
                    @foreach($errors as $error)
                        <img src="img/logo.png" alt="error"><b>{{$error->Date}}</b> Il sensore {{$error->sensor->model}} ha riscontrato il seguente errore: <b>"<u>{{$error->error->Description}}</u>"</b>.
                        <hr>
                        NON CAPISCO PERCHE' LA CAZZO DI IMMAGINE NON ESCE
                    @endforeach
                </div>
            </div>
        </div>

    </div>


    <div class="raw">
        <div class="col-lg-6">
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse"  href="#collapseOne">
                        <div class="panel-heading" style="text-align: center;">
                            <h2> Temperatura </h2>
                        </div>
                    </a>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <canvas id="tempChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse"  href="#collapseTwo">
                        <div class="panel-heading" style="text-align: center;">
                            <h2> Pressione </h2>
                        </div>
                    </a>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <canvas id="presChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse"  href="#collapseThree">
                        <div class="panel-heading" style="text-align: center;">
                            <h2> Umidità </h2>
                        </div>
                    </a>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <canvas id="umChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse"  href="#collapseFour">
                        <div class="panel-heading" style="text-align: center;">
                            <h2> Capacità </h2>
                        </div>
                    </a>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <canvas id="capChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Dashboard end -->

    <form>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sensori
                    </header>
                    <table class="table text-center" id="sensorsTable" data-toggle="table">
                        <thead>
                        <tr>
                            <th class="text-center">Modello</th>
                            <th class="text-center">Latitudine</th>
                            <th class="text-center">Longitudine</th>
                            <th class="text-center">Valore Massimo</th>
                            <th class="text-center">Valore Minimo</th>
                            <th class="text-center">Sito</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Tipo</th>
                            @if($user->usertype->Description == "ResponsabileAziendale")
                                <th class="text-center">Modifica</th>
                                <th class="text-center">Elimina</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @if($user->usertype->Description == "ResponsabileAziendale")
                        <tr>
                            <a class="btn icon-btn btn-success center-block" href="{{ route('showAddSensor', $id) }}">
                                <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success">
                                </span>
                                Aggiungi sensore
                            </a>
                        </tr>
                        @endif
                        @foreach($sensors as $sensor)
                            <tr class='clickable-row' data-href="{{--route('sensors' ,  $site->id)--}}">
                                <td>{{ $sensor->Model }}</td>
                                <td>{{ $sensor->Latitude }}</td>
                                <td>{{ $sensor->Longitude }}</td>
                                <td>{{ $sensor->MaxValue }}</td>
                                <td>{{ $sensor->MinValue }}</td>
                                <td>{{ $sensor->site->Description }}</td>
                                <td>{{ $sensor->brand->Description }}</td>
                                <td>{{ $sensor->type->Description }}</td>
                                @if($user->usertype->Description == "ResponsabileAziendale")
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editSensorModal" id="{{ $sensor->id}} | {{$sensor->Model}} | {{$sensor->Latitude}} | {{$sensor->Longitude}} | {{$sensor->MaxValue}} | {{$sensor->MinValue}} | {{ $sensor->brand->Description }} | {{ $sensor->type->Description }}"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteSensorModal" id="{{ $sensor->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </section>
            </div>
        </div>

        <div class="modal fade" id="editSensorModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Modifica il sensore</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="text" style="display: none" id="editModalID">
                        </div>
                        <div class="form-group">
                            Modello
                            <input class="form-control " type="text" placeholder="Modello" id="editModalModel">
                        </div>
                        <div class="form-group">
                            Latitudine
                            <input class="form-control " type="text" placeholder="Latitudine" id="editModalLatitude">
                        </div>
                        <div class="form-group">
                            Longitudine
                            <input class="form-control " type="text" placeholder="Longitudine" id="editModalLongitude">
                        </div>
                        <div class="form-group">
                            Valore Massimo
                            <input class="form-control " type="text" placeholder="Valore Massimo" id="editModalMaxVal">
                        </div>
                        <div class="form-group">
                            Valore Minimo
                            <input class="form-control " type="text" placeholder="Valore Minimo" id="editModalMinVal">
                        </div>
                        <div class="form-group">
                            Marca
                            <select id="editModalBrand" class="form-control">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->Description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            Tipo
                            <select id="editModalType" class="form-control">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->Description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" id="btnEditModalSensor" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Aggiorna</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteSensorModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Elimina Sito</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="text" style="display: none" id="deleteModalID">
                        </div>
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Sei sicuro di voler eliminare questo sensore?</div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" id="btnDeleteModalSensor" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        var dates = [];
        var ctx = document.getElementById('tempChart').getContext('2d');
        var elements = {
            // The type of chart we want to create
            type: 'line',

            data: {
                labels: [],
                datasets: []
            },
            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        };

        @foreach($data as $d)
            var values = [];
            var x = 18;

            @if($d['type'] == "Temperatura")
                @foreach($d['values'] as $value)
                    values.push({{$value}});
                @endforeach

                @foreach($d['dates'] as $date)
                    if(dates.indexOf("{{$date}}") == -1) {
                        dates.push('{{ $date }}');
                    }
                @endforeach

                var newdataset = {
                    label: "{{$d['model']}}",
                    backgroundColor: 'rgba(255, 99, 132, 0)',
                    borderColor: 'rgb(' + Math.floor((Math.random() * 249) + 1) + ', ' + Math.floor((Math.random() * 249) + 1) + ',' + Math.floor((Math.random() * 249) + 1) + ')',
                    data: values
                };

                elements.data.labels = dates.slice().sort();
                elements.data.datasets.push(newdataset);
            @endif
        @endforeach

        var chart = new Chart(ctx, elements);
    </script>

    <script>
        var dates = [];
        var ctx = document.getElementById('capChart').getContext('2d');
        var elements = {
            // The type of chart we want to create
            type: 'line',

            data: {
                labels: [],
                datasets: []
            },
            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        };

        @foreach($data as $d)
            var values = [];
            var x = 18;

            @if($d['type'] == "Capacità")
                @foreach($d['values'] as $value)
                    values.push({{$value}});
                @endforeach

                @foreach($d['dates'] as $date)
                if(dates.indexOf("{{$date}}") == -1) {
                    dates.push('{{ $date }}');
                }
                @endforeach

                var newdataset = {
                    label: "{{$d['model']}}",
                    backgroundColor: 'rgba(255, 99, 132, 0)',
                    borderColor: 'rgb(' + Math.floor((Math.random() * 249) + 1) + ', ' + Math.floor((Math.random() * 249) + 1) + ',' + Math.floor((Math.random() * 249) + 1) + ')',
                    data: values
                };

                elements.data.labels = dates.slice().sort();
                elements.data.datasets.push(newdataset);
            @endif
        @endforeach

        var chart = new Chart(ctx, elements);
    </script>

    <script>
        var dates = [];
        var ctx = document.getElementById('presChart').getContext('2d');
        var elements = {
            // The type of chart we want to create
            type: 'line',

            data: {
                labels: [],
                datasets: []
            },
            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        };

        @foreach($data as $d)
        var values = [];
        var x = 18;

            @if($d['type'] == "Pressione")
                @foreach($d['values'] as $value)
                values.push({{$value}});
                @endforeach

                @foreach($d['dates'] as $date)
                    if(dates.indexOf("{{$date}}") == -1) {
                        dates.push('{{ $date }}');
                    }
                @endforeach

                var newdataset = {
                        label: "{{$d['model']}}",
                        backgroundColor: 'rgba(255, 99, 132, 0)',
                        borderColor: 'rgb(' + Math.floor((Math.random() * 249) + 1) + ', ' + Math.floor((Math.random() * 249) + 1) + ',' + Math.floor((Math.random() * 249) + 1) + ')',
                        data: values
                    };

                elements.data.labels = dates.slice().sort();
                elements.data.datasets.push(newdataset);
            @endif
        @endforeach

        var chart = new Chart(ctx, elements);
    </script>

    <script>
        var dates = [];
        var ctx = document.getElementById('umChart').getContext('2d');
        var elements = {
            // The type of chart we want to create
            type: 'line',

            data: {
                labels: [],
                datasets: []
            },
            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        };

        @foreach($data as $d)
        var values = [];
        var x = 18;

            @if($d['type'] == "Umidità")
                @foreach($d['values'] as $value)
                values.push({{$value}});
                @endforeach

                @foreach($d['dates'] as $date)
                    if(dates.indexOf("{{$date}}") == -1) {
                        dates.push('{{ $date }}');
                    }
                @endforeach

                var newdataset = {
                        label: "{{$d['model']}}",
                        backgroundColor: 'rgba(255, 99, 132, 0)',
                        borderColor: 'rgb(' + Math.floor((Math.random() * 249) + 1) + ', ' + Math.floor((Math.random() * 249) + 1) + ',' + Math.floor((Math.random() * 249) + 1) + ')',
                        data: values
                    };

                elements.data.labels = dates.slice().sort();
                elements.data.datasets.push(newdataset);
            @endif
        @endforeach

        var chart = new Chart(ctx, elements);
    </script>
@endsection

