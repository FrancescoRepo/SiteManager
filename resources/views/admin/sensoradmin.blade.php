@section('title', 'Utenti')
@section('path', 'Utenti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @foreach($sites as $site)
                <strong>{{$site->Name}} , {{$site->Description}}</strong>
                <section class="panel">
                    <table class=" table text-center">
                        <thead>
                        <tr>
                            <th class="text-center">Modello</th>
                            <th class="text-center">Latitudine</th>
                            <th class="text-center">Longitudine</th>
                            <th class="text-center">Valore Massimo</th>
                            <th class="text-center">Valore Minimo</th>
                            <th class="text-center">Sito</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Tipo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sensors as $sensor)
                            @if($sensor->site_id == $site->id)
                                <tr>
                                    <td>{{ $sensor->Model }}</td>
                                    <td>{{ $sensor->Latitude }}</td>
                                    <td>{{ $sensor->Longitude }}</td>
                                    <td>{{ $sensor->MaxValue }}</td>
                                    <td>{{ $sensor->MinValue }}</td>
                                    <td>{{ $sensor->site->Description }}</td>
                                    <td>{{ $sensor->brand->Description }}</td>
                                    <td>{{ $sensor->type->Description }}</td>
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