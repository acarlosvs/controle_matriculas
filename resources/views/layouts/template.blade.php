<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Controle de Matrículas - @yield('title')</title>
    <meta https-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">

    @yield('css')

</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('#') }}">
                    Sistema de Controle de Matrículas
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div id="app">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{asset('/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        var urlBase = "{{url('/')}}";
        urlBase = "{{url('')}}";
    </script>
    
    <script src="{{asset('/js/app.js')}}" type="text/javascript"></script>

    @yield('script')

</body>
</html>