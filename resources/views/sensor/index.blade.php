@section('title', 'Sensori')
@section('path', 'Sensori')

@extends('master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sensori di
                </header>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Azioni</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($sensors as $sensor)
                        <tr>
                            <td>{{ $site->Name }}</td>
                            <td>{{ $site->Description }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                    <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </section>
        </div>
    </div>

@endsection