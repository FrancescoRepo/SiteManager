@section('title', 'Utenti')
@section('path', 'Utenti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="row text-center">
            <a class="btn icon-btn btn-success center-block" href="{{ route('showAdd', 'user') }}">
                <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success">
                </span>
                Aggiungi Utente
            </a>
        </div>

        <br>
        <div class="col-lg-12">
            @foreach($customers as $customer)
                <b><p style="margin-bottom: 10px">Utenti {{$customer->BusinessName}}</p></b>
                <section class="panel">
                    <table class=" table text-center">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px">ID</th>
                            <th class="text-center" style="width: 200px">CF</th>
                            <th class="text-center"style="width: 200px">Nome</th>
                            <th class="text-center"style="width: 200px">Cognome</th>
                            <th class="text-center"style="width: 200px">Sesso</th>
                            <th class="text-center" style="width: 200px">Username</th>
                            <th class="text-center" style="width: 200px">Tipo</th>
                            <th class="text-center"style="width: 200px">Modifica</th>
                            <th class="text-center"style="width: 200px">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer->users as $user)
                                <tr>
                                    <th class="text-center">{{$user->id}}</th>
                                    <th class="text-center">{{$user->CF}}</th>
                                    <th class="text-center">{{$user->Name}}</th>
                                    <th class="text-center">{{$user->Surname}}</th>
                                    <th class="text-center">{{$user->Sex}}</th>
                                    <th class="text-center">{{$user->username}}</th>
                                    <th class="text-center">{{$user->usertype->Description}}</th>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editUserModal" id="{{ $user->id }} | {{ $user->CF }} | {{ $user->Name }} | {{ $user->Surname }} | {{ $user->Sex }} | {{ $user->username }} | {{ $user->password }} | {{ $user->Email }} | {{ $user->Phone }} | {{ $user->usertype->Description }} | {{ $user->client->BusinessName }}"><span class="glyphicon glyphicon-pencil" id="btnOpenModalUser"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteUserModal" id="{{ $user->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Modifica Utente</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" style="display: none" id="editModalID">
                    </div>
                    <div class="form-group">
                        Codice Fiscale
                        <input class="form-control " type="text" placeholder="Codice Fiscale" id="editModalCF">
                    </div>
                    <div class="form-group">
                        Nome
                        <input class="form-control " type="text" placeholder="Nome" id="editModalName">
                    </div>
                    <div class="form-group">
                        Cognome
                        <input class="form-control " type="text" placeholder="Cognome" id="editModalSurname">
                    </div>
                    <div class="form-group">
                        Sesso
                        <input class="form-control " type="text" placeholder="Sesso" id="editModalSex">
                    </div>
                    <div class="form-group">
                        Username
                        <input class="form-control " type="text" placeholder="Username" id="editModalUsername">
                    </div>
                    <div class="form-group">
                        Password
                        <input class="form-control " type="text" placeholder="Password" id="editModalPassword">
                    </div>
                    <div class="form-group">
                        Email
                        <input class="form-control " type="text" placeholder="Email" id="editModalEmail">
                    </div>
                    <div class="form-group">
                        Telefono
                        <input class="form-control " type="text" placeholder="Telefono" id="editModalPhone">
                    </div>
                    <div class="form-group">
                        Tipo
                        <select class="form-control" id="editModalUsertype">
                            @foreach($usersTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->Description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Cliente
                        <select class="form-control" id="editModalCustomer">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->BusinessName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnEditModalUser" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Aggiorna</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Elimina Utente</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" style="display: none" id="deleteModalID">
                    </div>
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Sei sicuro di voler eliminare questo utente?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" id="btnDeleteModalUser" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
        </div>
    </div>
@endsection
