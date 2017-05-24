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
                <td><input type="text" value="{{ Auth::user()->CF }}" class="form-control"></td>
                <td></td>
            </tr>
            <tr>
                <td>Nome</td>
                <td><input type="text" value="{{ Auth::user()->Nome }}" class="form-control"></td>
                <td></td>
            </tr>
            <tr>
                <td>Cognome</td>
                <td><input type="text" value="{{ Auth::user()->Cognome }}" class="form-control"></td>
                <td></td>
            </tr>
            <tr>
                <td>Sesso</td>
                <td>
                    <select class="form-control" name="sesso">
                        <option value="{{ Auth::user()->Sesso }}"> {{ Auth::user()->Sesso }}</option>
                        @if(Auth::user()->Sesso == "Maschio")
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
                <td><input type="text" value="{{ Auth::user()->username }}" class="form-control"></td>
                <td></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" value="{{ Auth::user()->password }}" class="form-control" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>Nuova password</td>
                <td><input type="password" class="form-control"></td>
                <td></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" value="{{ Auth::user()->email }}" class="form-control"></td>
                <td></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" value="{{ Auth::user()->Telefono }}" class="form-control"></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <button id="update_account" type="submit" class="btn btn-primary">Salva</button>
</div> <!-- /#page-content-wrapper -->
@endsection