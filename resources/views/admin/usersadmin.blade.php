@section('title', 'Utenti')
@section('path', 'Utenti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @foreach($customers as $customer)
                <strong>Utenti {{$customer->BusinessName}}</strong>
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
