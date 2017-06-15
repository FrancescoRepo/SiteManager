@section('title', 'Home')
@section('path', 'Home')

@extends('masteradmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <br><br>
            <h1 class="text-center">Benvenuto Admin</h1>
            <h4 class="text-center"><b> {{ $user->Name}} {{ $user->Surname }} </b></h4>
        </div>
    </div>

@endsection

