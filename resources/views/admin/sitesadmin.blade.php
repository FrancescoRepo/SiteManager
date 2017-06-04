@section('title', 'Siti')
@section('path', 'Siti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="row text-center">
            <a class="btn icon-btn btn-success center-block" href="{{ route('showAdd', 'site') }}">
                <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success">
                </span>
                Aggiungi Sito
            </a>
        </div>

        <br>
        <div class="col-lg-12">
                <section class="panel">
                    <table class=" table text-center">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px">ID</th>
                                <th class="text-center" style="width: 200px">Nome</th>
                                <th class="text-center"style="width: 200px">Descrizione</th>
                                <th class="text-center"style="width: 200px">Indirizzo</th>
                                <th class="text-center"style="width: 200px">Modifica</th>
                                <th class="text-center"style="width: 200px">Elimina</th>
                            <tr>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sites as $site)
                                <tr>
                                    <th class="text-center">{{$site->id}}</th>
                                    <th class="text-center">{{$site->Name}}</th>
                                    <th class="text-center">{{$site->Description}}</th>
                                    <th class="text-center">{{$site->address->Street}}, {{$site->address->StreetNumber}}, {{$site->address->Province}} </th>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editSiteModal" id="{{ $site->id }} | {{ $site->Name }} | {{ $site->Description }} | {{ $site->address->id }} | {{ $site->address->Street }} | {{ $site->address->StreetNumber }} | {{ $site->address->Province }}"><span class="glyphicon glyphicon-pencil" id="btnOpenModalSite"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteSiteModal" id="{{ $site->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
        </div>
    </div>

    <div class="modal fade" id="editSiteModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Modifica Sito</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" style="display: none" id="editModalID">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Nome" id="editModalName">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Descrizione" id="editModalDescription">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" style="display: none" id="editModalAddressID">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Via" id="editModalStreet">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Civico" id="editModalStreetNumber">
                    </div>
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Provincia" id="editModalProvince">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnEditModalSite" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Aggiorna</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteSiteModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Sei sicuro di voler eliminare questo sito?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" id="btnDeleteModalSite" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
        </div>
    </div>
@endsection
