@section('title', 'Utenti')
@section('path', 'Utenti')

@extends('masteradmin')

@section('content')
    <div class="row">
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
                        @foreach($users as $user)
                            @if($user->client_id == $customer->id)
                                <tr>
                                    <th class="text-center">{{$user->id}}</th>
                                    <th class="text-center">{{$user->CF}}</th>
                                    <th class="text-center">{{$user->Name}}</th>
                                    <th class="text-center">{{$user->Surname}}</th>
                                    <th class="text-center">{{$user->Sex}}</th>
                                    <th class="text-center">{{$user->username}}</th>
                                    <th class="text-center">{{$user->usertype->Description}}</th>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editSiteModal" id=""><span class="glyphicon glyphicon-pencil" id="btnOpenModalSite"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteSiteModal" id="" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </section>
            @endforeach
        </div>
    </div>
@endsection
