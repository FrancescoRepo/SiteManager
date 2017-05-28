@section('title', 'Siti')
@section('path', 'Siti')

@extends('master')

@section('content')
    <form>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Siti
                    </header>
                    <table class="table text-center" id="sitesTable" data-toggle="table">
                        <thead>
                        <tr>
                            <th class="text-center" data-field="Name">Nome</th>
                            <th class="text-center" data-field="Description">Descrizione</th>
                            @if(Auth::user()->usertype->Description == "ResponsabileAziendale")
                                <th class="text-center">Modifica</th>
                                <th class="text-center">Elimina</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($sites as $site)
                            <tr class='clickable-row' data-href="{{route('sensors' ,  $site->id)}}">
                                <td><a href="{{route('sensors' , $site->id)}}">{{ $site->Name }}</a></td>
                                <td>{{ $site->Description }}</td>
                                @if(Auth::user()->usertype->Description == "ResponsabileAziendale")
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editSiteModal" id="{{ $site->id }} | {{ $site->Name }} | {{ $site->Description }}"><span class="glyphicon glyphicon-pencil" id="btnOpenModalSite"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteSiteModal" id="{{ $site->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                @endif
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
                        <h4 class="modal-title custom_align" id="Heading">Modifica il sito</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="text" style="display: none" id="editModalID">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="Nome" id="editModalName">
                        </div>
                        <div class="form-group">
                            <textarea rows="2" class="form-control" placeholder="Descrizione" id="editModalDescription"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" id="btnEditModal" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Aggiorna</button>
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
                        <button type="button" id="btnDeleteModal" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection