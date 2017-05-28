@section('title', 'Home')
@section('path', 'Home')

@extends('master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2> Benvenuto <b>{{Auth::user()->Name}} {{ Auth::user()->Surname }}</b></h2>
        </div>
    </div>
@endsection

