@section('title', 'Utenti')
@section('path', 'Utenti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @foreach($sites as $site)
                <b><p style="margin-bottom: 10px">{{$site->Name}} , {{$site->Description}}</p></b>
                <section class="panel">
                    <table class=" table text-center">
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
                            <th class="text-center"style="width: 200px">Modifica</th>
                            <th class="text-center"style="width: 200px">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->sensors as $sensor)
                                <tr>
                                    <td>{{ $sensor->Model }}</td>
                                    <td>{{ $sensor->Latitude }}</td>
                                    <td>{{ $sensor->Longitude }}</td>
                                    <td>{{ $sensor->MaxValue }}</td>
                                    <td>{{ $sensor->MinValue }}</td>
                                    <td>{{ $sensor->site->Description }}</td>
                                    <td>{{ $sensor->brand->Description }}</td>
                                    <td>{{ $sensor->type->Description }}</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editSensorModal" id="{{ $sensor->id }} | {{ $sensor->Model }} | {{ $sensor->Latitude }} | {{ $sensor->Longitude }} | {{ $sensor->MaxValue }} | {{ $sensor->MinValue }} | {{ $sensor->site->Name }} | {{ $sensor->brand->Description }} | {{ $sensor->type->Description }}"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteSensorModal" id="{{ $sensor->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="editSensorModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Modifica Sensore</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" style="display: none" id="editModalID">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Modello" id="editModalModel">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Latitudine" id="editModalLatitude">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Longitudine" id="editModalLongitude">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Valore Massimo" id="editModalValMax">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Valore Minimo" id="editModalValMin">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="editModalSite">
                            @foreach($sites as $site)
                                <option value="{{ $site->id }}">{{ $site->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="editModalBrand">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->Description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="editModalType">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->Description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
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
                    <h4 class="modal-title custom_align" id="Heading">Elimina Sensore</h4>
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
@endsection