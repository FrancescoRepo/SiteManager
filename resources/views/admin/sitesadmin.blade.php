@section('title', 'Siti')
@section('path', 'Siti')

@extends('masteradmin')

@section('content')
    <h1>PAGE UNDER CONTRUCTION</h1>
    <!--
    <div class="row">
        <div class="col-lg-12">
            @foreach($customers as $customer)
                <strong>Siti {{$customer->BusinessName}}</strong>
                <section class="panel">
                    <table class=" table text-center">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px">ID</th>
                            <th class="text-center" style="width: 200px">CF</th>
                            <th class="text-center"style="width: 200px">Nome</th>
                            <th class="text-center"style="width: 200px">Cognome</th>
                            <th class="text-center"style="width: 200px">Sesso</th>
                            <th class="text-center" style="width: 200px">Username</th>
                            <th class="text-center" style="width: 200px">Tipo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sites as $site)
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            @endforeach
        </div>
    </div>
    --!>
@endsection
