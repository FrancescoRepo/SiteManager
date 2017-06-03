@extends('layouts.app')

@section('content')
    <div class="container">
        <div align="center" style="margin-top:10%">
            <img src="img/logo.png" alt="SiteManager">
        </div>
        <form class="login-form" action="{{ route('updatePassword', Auth::user()) }}" method="POST">
            {{ csrf_field() }}
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <p style="color: rgb(162, 35, 29); font-size: 18px; padding-bottom: 15px">Benvenuto. Per motivi di sicurezza reimposta la tua password.</p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input id="pass1" name="password" type="password" class="form-control" placeholder="Nuova Password"  required autofocus>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input id="pass2" name="confirmpassword" type="password" class="form-control" placeholder="Conferma Password" required onkeyup="checkPass(); return false;">
                    <span id="confirmMessage" class="input-group-addon"></span>
                </div>
                <button class="btn btn-primary btn-lg btn-block"  id="confirmButton" type="submit">Cambia password</button>
            </div>
        </form>
    </div>
@endsection

<script type="text/javascript">
    function checkPass()
    {
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        var message = document.getElementById('confirmMessage');
        if(pass1.value.trim() == pass2.value.trim() ){
            message.innerHTML = '<img src="/img/green-tick.png" style="width: 16px; height: 16px;">';
            document.getElementById('confirmButton').disabled = false;
        }else{
            message.innerHTML = '<img src="/img/red-tick.png" style="width: 16px; height: 16px;">'
            document.getElementById('confirmButton').disabled = true;
        }
    }
</script>