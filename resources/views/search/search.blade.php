@section('title', 'Ricerca')
@section('path', 'Ricerca')
@extends('master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <form>
            <div class="row">
                <h1 class="text-center">Ricerca</h1>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="Cerca" required/>
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit">
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
                    <input type="radio" name="optRadio">Sito
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optRadio">Sensore
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optRadio">Utente
                </label>
            </div>
        </form>
    </div>
@endsection