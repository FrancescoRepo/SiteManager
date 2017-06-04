@section('title', 'Inserisci Cliente')
@section('path', 'Inserisci Cliente')

@extends('masteradmin')

@section('content')
    <div class="box-content">
        <form action="{{ route('add', 'client') }}" method="POST">
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
                        <td>Partita IVA</td>
                        <td><input type="text" id="PI" name="PI" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Ragione Sociale</td>
                        <td><input type="text" id="BusinessName" name="BusinessName" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nazione</td>
                        <td><input type="text" id="Country" name="Country" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Provincia</td>
                        <td><input type="text" id="Province" name="Province" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Città</td>
                        <td><input type="text" id="City" name="City" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Via</td>
                        <td><input type="text" id="Street" name="Street" class="form-control"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Civico</td>
                        <td><input type="text" id="StreetNumber" name="StreetNumber" class="form-control"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>CodicePostale</td>
                        <td><input type="text" id="ZipCode" name="ZipCode" class="form-control"></td>
                        <td></td>
                    </tr>

                    @if ($errors->has('Address'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('Address') }}</strong>
                        </span>
                    @endif

                    </tbody>
                </table>
            </div>
            <button id="insert_client" type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection