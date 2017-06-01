@section('title', 'Clienti')
@section('path', 'Clienti')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <table class=" table text-center">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">PartitaIva</th>
                            <th class="text-center">Ragione Sociale</th>
                            <th class="text-center"style="width: 200px">Modifica</th>
                            <th class="text-center"style="width: 200px">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                                <tr>
                                    <th class="text-center">{{$customer->id}}</th>
                                    <th class="text-center">{{$customer->BusinessName}}</th>
                                    <th class="text-center">{{$customer->PI}}</th>
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
        </div>
    </div>

@endsection
