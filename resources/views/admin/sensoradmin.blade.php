@section('title', 'Utenti')
@section('path', 'Utenti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @foreach($sites as $site)
                <b><p style="margin-bottom: 10px">{{$site->Name}} , {{$site->Description}}</p></b>
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
                            <th class="text-center"style="width: 200px">Modifica</th>
                            <th class="text-center"style="width: 200px">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->sensors as $sensor)
                                <tr>
                                    <td>{{ $sensor->Model }}</td>
                                    <td>{{ $sensor->Latitude }}</td>
                                    <td>{{ $sensor->Longitude }}</td>
                                    <td>{{ $sensor->MaxValue }}</td>
                                    <td>{{ $sensor->MinValue }}</td>
                                    <td>{{ $sensor->site->Description }}</td>
                                    <td>{{ $sensor->brand->Description }}</td>
                                    <td>{{ $sensor->type->Description }}</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editSiteModal" id=""><span class="glyphicon glyphicon-pencil" id="btnOpenModalSite"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteSiteModal" id="" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            @endforeach
        </div>
    </div>
@endsection