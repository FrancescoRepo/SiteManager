@section('title', 'Aggiungi sensore')
@section('path', 'Aggiungi sensore')

@extends('master')

@section('content')
    <div class="box-content">
        <form action="{{ route('insertSensor') }}" method="POST">
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
                    </tr>
                    <tr>
                        <td>Longitudine</td>
                        <td><input type="number" id="Longitude" name="Longitude" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Valore Massimo</td>
                        <td><input type="number" id="MaxValue" name="MaxValue" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Valore Minimo</td>
                        <td><input type="number" id="MinValue" name="MinValue" class="form-control" required></td>
                        <td></td>
                    </tr>
                    <tr style="display: none">
                        <td>Sito</td>
                        <td><input type="hidden" id="site_id" name="site_id" value="{{ $site->id }}" class="form-control" readonly></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Marca</td>
                        <td>
                            <select class="form-control" name="brand_id">
                                <option id="brand_id" name="brand_id"></option>
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
                            <select class="form-control" name="type_id">
                                <option id="type_id" name="type_id"></option>
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
            <button id="insert_site" type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection