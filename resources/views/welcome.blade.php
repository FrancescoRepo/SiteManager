@section('title', 'Home')
@section('path', 'Home')

@extends('master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center"> Benvenuto </h1>
            <h4 class="text-center"><b>{{ $user->Name }} {{ $user->Surname }}</b></h4>
        </div>
    </div>
@endsection

