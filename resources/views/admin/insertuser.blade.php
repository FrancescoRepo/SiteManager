@section('title', 'Inserisci Utente')
@section('path', 'Inserisci Utente')

@extends('masteradmin')

@section('content')
    <div class="box-content">
        <form action="{{ route('add', 'user') }}" method="POST">
            {{ csrf_field() }}
            <div class="table-container">
                <table class="table is-datatable dataTable">
                    <thead>
                    <tr>
                        <th>Dati</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>CF</td>
                        <td><input type="text" id="CF" name="CF" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td><input type="text" id="Name" name="Name" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Cognome</td>
                        <td><input type="text" id="Surname" name="Surname" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sesso</td>
                        <td>
                            <select name="Sex" id="Sex" class="form-control">
                                <option value="Maschio" selected>Maschio</option>
                                <option value="Femmina">Femmina</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" id="username" name="username" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" id="password" name="password" class="form-control" required></td>
                        <td></td>
                    </tr>

                        <input type="hidden" id="FirstLogin" name="FirstLogin" value="1">

                    <tr>
                        <td>Email</td>
                        <td><input type="email" id="Email" name="Email" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input type="text" id="Phone" name="Phone" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tipo utente</td>
                        <td>
                            <select name="usertype_id" id="usertype_id" class="form-control">
                                @foreach($usertypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->Description }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Cliente</td>
                        <td>
                            <select name="client_id" id="client_id" class="form-control">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->BusinessName }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button id="insert_user" type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
