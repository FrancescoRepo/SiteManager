@section('title', 'Sensori')
@section('path', 'Sensori')

@extends('master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sensori
                </header>
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Modello</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Latitudine</th>
                        <th class="text-center">Longitudine</th>
                        @if(Auth::user()->usertype->Description == "ResponsabileAziendale")
                            <th class="text-center">Modifica</th>
                            <th class="text-center">Elimina</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sensors as $sensor)
                        <tr class='clickable-row' data-href="">
                            <td>{{ $sensor->brand->Description }}</td>
                            <td>{{ $sensor->Model}}</td>
                            <td>{{ $sensor->sensortype_id }}</td>
                            <td>{{ $sensor->Latitude }}</td>
                            <td>{{ $sensor->Longitude }}</td>
                            @if(Auth::user()->usertype->Description == "ResponsabileAziendale")
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                </td>
                            @endif
                        </tr>

                    @endforeach
                    </tbody>

                </table>
            </section>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Modifica il sensore</h4>
                </div>
                <form href="{{route('updateSensor', $sensor)}}" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control " type="text" value="{{$sensor->brand->Description}}">
                        </div>
                        <div class="form-group">
                            <input rows="2" class="form-control" value="{{$sensor->Model}}"></input>
                        </div>
                        <div class="form-group">
                            <input rows="2" class="form-control" value="{{$sensor->Latitude}}"></input>
                        </div>
                        <div class="form-group">
                            <input rows="2" class="form-control" value="{{$sensor->Longitude}}"></input>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifica Dati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

@endsection