@section('title', 'Impostazioni Account')
@section('path', 'Il mio Profilo')
@extends('master')

@section('content')
    <div class="box-content">
        <div class="table-container">
            <table id="edit_account" class="table is-datatable dataTable">
                <thead>
                <tr>
                    <th>Dati</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Codice Fiscale</td>
                    <td><input type="text" value="{{ $user->CF }}" class="form-control" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td><input type="text" value="{{ $user->Name }}" class="form-control" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cognome</td>
                    <td><input type="text" value="{{ $user->Surname }}" class="form-control" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sesso</td>
                    <td>
                        <select class="form-control" name="sesso">
                            <option value="{{ $user->Sex }}"> {{ $user->Sex }}</option>
                            @if(Auth::user()->Sex == "Maschio")
                                <option value="Femmina">Femmina</option>
                            @else
                                <option value="Maschio">Maschio</option>
                            @endif
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" value="{{ $user->username }}" class="form-control" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" value="{{ $user->password }}" class="form-control" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nuova password</td>
                    <td><input type="password" class="form-control"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" value="{{ $user->Email }}" class="form-control"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td><input type="text" value="{{ $user->Phone }}" class="form-control" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tipo utente</td>
                    <td><input type="text" value="{{ $user->usertype->Description }}" class="form-control" required>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Azienda di riferimento</td>
                    <td><input type="text" value="{{ $user->client->BusinessName}}" class="form-control" required
                               readonly></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <button id="update_account" type="submit" class="btn btn-primary">Salva</button>
    </div>
@endsection