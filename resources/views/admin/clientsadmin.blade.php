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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                                <tr>
                                    <th class="text-center">{{$customer->id}}</th>
                                    <th class="text-center">{{$customer->BusinessName}}</th>
                                    <th class="text-center">{{$customer->PI}}</th>

                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
        </div>
    </div>

@endsection
