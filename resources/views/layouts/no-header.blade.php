<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'TheInternship') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- bootstrap select -->
    <link rel="stylesheet" href="{{ URL::to('bootstrap-select/css/bootstrap-select.css') }}">

</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- bootstrap select -->
    <script src="{{ URL::to('bootstrap-select/js/bootstrap-select.js') }}"></script>

</body>
</html>
