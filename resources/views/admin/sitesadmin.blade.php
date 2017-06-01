@section('title', 'Siti')
@section('path', 'Siti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <table class=" table text-center">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px">ID</th>
                                <th class="text-center" style="width: 200px">Nome</th>
                                <th class="text-center"style="width: 200px">Descrizione</th>
                                <th class="text-center"style="width: 200px">Indirizzo</th>
                                <th class="text-center"style="width: 200px">Modifica</th>
                                <th class="text-center"style="width: 200px">Elimina</th>
                            <tr>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sites as $site)
                                <tr>
                                    <th class="text-center">{{$site->id}}</th>
                                    <th class="text-center">{{$site->Name}}</th>
                                    <th class="text-center">{{$site->Description}}</th>
                                    <th class="text-center">{{$site->address->Street}}, {{$site->address->StreetNumber}}, {{$site->address->Province}} </th>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Modifica"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editSiteModal" id="{{ $site->id }} | {{ $site->Name }} | {{ $site->Description }}"><span class="glyphicon glyphicon-pencil" id="btnOpenModalSite"></span></button></p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Elimina"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteSiteModal" id="{{ $site->id }}" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
        </div>
    </div>
@endsection
