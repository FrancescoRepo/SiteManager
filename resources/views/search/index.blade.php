@section('title', 'Ricerca')
@section('path', 'Ricerca')
@extends('master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <form id="formsearch">
            <div class="row">
                <h1 class="text-center">Ricerca</h1>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="text" id="txtSearch" name="txtSearch" placeholder="Cerca" required/>
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="btnSearch" name="btnSearch" >
                                <span class="glyphicon glyphicon-search" aria-hidden="true">
                                    <span style="margin-left:10px;">Ricerca</span>
                                </span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <label class="radio-inline">
                    <input type="radio" name="optRadio" value="Sito" checked/>Sito
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optRadio" value="Sensore"/>Sensore
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optRadio" value="Utente"/>Utente
                </label>
            </div>
        </form>
    </div>

    <div class="col-md-6 col-md-offset-3" id="div_search_ok_result" style="display: none;">
        <h1 class="text-center">Risultati</h1>
    </div>

    <div class="col-md-6 col-md-offset-3" id="div_search_no_result" style="display: none">
        <h1 class="text-center">Nessun risultato trovato</h1>
    </div>

    <div class="row" id="row_table_sites" style="display:none">
        <table class="display table table-bordered" id="sites_table">
            <thead>
            <tr>
                <th data-field="Name" class="text-center">Nome</th>
                <th data-field="Description" class="text-center">Descrizione</th>
            </tr>
            </thead>
        </table>
    </div>

    <div class="row" id="row_table_users" style="display: none">
        <table class="display table table-bordered" id="users_table">
            <thead>
            <tr>
                <th data-field="CF" class="text-center">CF</th>
                <th data-field="Name" class="text-center">Nome</th>
                <th data-field="Surname" class="text-center">Cognome</th>
                <th data-field="Sex" class="text-center">Sesso</th>
                <th data-field="Email" class="text-center">Email</th>
                <th data-field="Phone" class="text-center">Telefono</th>
            </tr>
            </thead>
        </table>
    </div>

    <div class="row" id="row_table_sensors" style="display: none;">
        <table class="display table table-bordered" id="sensors_table">
            <thead>
            <tr>
                <th data-field="Model" class="text-center">Modello</th>
                <th data-field="Latitude" class="text-center">Latitudine</th>
                <th data-field="Longitude" class="text-center">Longitudine</th>
                <th data-field="MaxValue" class="text-center">Valore Massimo</th>
                <th data-field="MinValue" class="text-center">Valore Minimo</th>
            </tr>
            </thead>
        </table>
    </div>

@endsection

<script type="text/javascript">

</script>