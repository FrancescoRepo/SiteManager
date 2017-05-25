@section('title', 'Impostazioni')
@section('path', 'Impostazioni')
@extends('master')

@section('content')
    <!-- Inizio trasferimento dati -->
    <div class="row">
        <div class="col-md-12">
            <h1>Servizi</h1>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column">
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <div class="list-group">

                            <div class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Sito

                                </h4>
                                <p class="list-group-item-text">
                                    <select class="form-control">
                                        <option>Ciao</option>
                                    </select>
                                </p>
                            </div>

                            <div class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Trasferimento automatico dati

                                </h4>
                                <p class="list-group-item-text">
                                    <span class="label label-success">Operational</span>
                                </p>
                            </div>

                            <div class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    Trasferisci a

                                </h4>
                                <p class="list-group-item-text">
                                    <select class="form-control">
                                        <option>Ciao</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fine Trasferimento dati -->
@endsection