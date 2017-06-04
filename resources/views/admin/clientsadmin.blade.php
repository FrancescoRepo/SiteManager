@section('title', 'Clienti')
@section('path', 'Clienti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="row text-center">
            <a class="btn icon-btn btn-success center-block" href="{{ route('showAdd', 'client') }}">
                <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success">
                </span>
                Aggiungi Cliente
            </a>
        </div>

        <br>
        <div class="col-lg-12">
                <section class="panel">
                    <table class=" table text-center">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">PartitaIva</th>
                            <th class="text-center">Ragione Sociale</th>
                            <th class="text-center"style="width: 200px">Modifica</th>
                            <th class="text-center"style="width: 200px">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                                <tr>
                                    <th class="text-center">{{$customer->id}}</th>
                                    <th class="text-center">{{$customer->BusinessName}}</th>
                                    <th class="text-center">{{$customer->PI}}</th>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editClientModal" id="{{ $customer->id }} | {{ $customer->PI }} | {{ $customer->BusinessName }}"><span class="glyphicon glyphicon-pencil" id="btnOpenModalSite"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteClientModal" id="{{ $customer->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
        </div>
    </div>

    <div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Modifica Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" style="display: none" id="editModalID">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="P.IVA" id="editModalPI">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Ragione Sociale" id="editModalBusinessName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnEditModalClient" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Aggiorna</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteClientModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Elimina Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" style="display: none" id="deleteModalID">
                    </div>
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Sei sicuro di voler eliminare questo cliente?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" id="btnDeleteModalClient" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
        </div>
    </div>

@endsection
