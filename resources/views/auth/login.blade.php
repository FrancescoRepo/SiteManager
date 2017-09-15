@extends('layouts.app')

@section('content')
    <div class="container">

        <div align="center" style="margin-top:10%">
            <img src="img/logo.png" alt="SiteManager">
        </div>
        <form class="login-form" action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}

            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input id="username" name="username" type="text" class="form-control" placeholder="Username"
                           required autofocus>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password"
                           required autofocus>
                </div>

                @if ($errors->has('password') || $errors->has('username'))
                    <div class="alert alert-danger">
                        <strong>Attenzione!</strong> Dati inseriti non corretti
                    </div>
                @endif

                <button class="btn btn-primary btn-lg btn-block" type="submit" id="login" name="login">Login</button>
            </div>
        </form>
    </div>
@endsection
