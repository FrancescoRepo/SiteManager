@section('title', 'Inserisci Sensore')
@section('path', 'Inserisci Sensore')

@extends('masteradmin')

@section('content')
    <div class="box-content">
        <form action="{{ route('add', 'sensor') }}" method="POST">
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
                        <td>Modello</td>
                        <td><input type="text" id="Model" name="Model" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Latitudine</td>
                        <td><input type="number" id="Latitude" name="Latitude" class="form-control" required></td>
                        <td></td>
                        @if ($errors->has('Latitude'))
                            <div class="alert alert-danger">
                                <strong>Attenzione! </strong>{{ $errors->first('Latitude') }}
                            </div>
                        @endif
                    </tr>
                    <tr>
                        <td>Longitudine</td>
                        <td><input type="number" id="Longitude" name="Longitude" class="form-control" required></td>
                        <td></td>
                        @if ($errors->has('Longitude'))
                            <div class="alert alert-danger">
                                <strong>Attenzione! </strong>{{ $errors->first('Longitude') }}
                            </div>
                        @endif
                    </tr>
                    <tr>
                        <td>Valore Massimo</td>
                        <td><input type="number" id="MaxValue" name="MaxValue" class="form-control" required></td>
                        <td></td>
                        @if ($errors->has('MaxValue'))
                            <div class="alert alert-danger">
                                <strong>Attenzione! </strong>{{ $errors->first('MaxValue') }}
                            </div>
                        @endif
                    </tr>
                    <tr>
                        <td>Valore Minimo</td>
                        <td><input type="number" id="MinValue" name="MinValue" class="form-control" required></td>
                        <td></td>
                        @if ($errors->has('MinValue'))
                            <div class="alert alert-danger">
                                <strong>Attenzione! </strong>{{ $errors->first('MinValue') }}
                            </div>
                        @endif
                    </tr>
                    <tr>
                        <td>Sito</td>
                        <td>
                            <select name="site_id" id="site_id" class="form-control" required>
                                @foreach($sites as $site)
                                    <option value="{{ $site->id }}">{{ $site->Name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Marca</td>
                        <td>
                            <select class="form-control" name="brand_id" required>
                                <!--<option id="brand_id" name="brand_id"></option>-->
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->Description }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td>
                            <select class="form-control" name="type_id" required>
                                <!--<option id="type_id" name="type_id"></option>-->
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->Description }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button id="insert_sensor" type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection