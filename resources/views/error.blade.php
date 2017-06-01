<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 - Page Not Found</title>
    <style>
        .error-template {padding: 40px 15px;text-align: center;}
        .error-actions {margin-top:15px;margin-bottom:15px;}
        .error-actions .btn { margin-right:10px;}
    </style>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('css/bootstrap-theme.css')}}" rel="stylesheet"/>
    <!-- bootstrap table -->
    <link href="{{ asset('css/bootstrap-table.css')}}" rel="stylesheet"/>
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles -->
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/xcharts.min.css') }}" rel=" stylesheet"/>
    <link href="{{ asset('css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet"/>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="error-template">
                <h1>Oops!</h1>
                <h2>404 Not Found</h2>
                <div class="error-details">
                    Non sei autorizzato a visitare questa pagina.<br>
                </div>
                <div class="error-actions">
                    <form action="{{route('welcome')}}">
                        <button type="submit" class="btn btn-success">Home</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>