<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>
    <link rel="icon" type="img/png" href="{{ asset('img/brand/beer.png') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('trumbo/ui/trumbowyg.min.css') }}" type="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/css/tempusdominus-bootstrap-4.min.css" />

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('icomoon/style.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600|Roboto" rel="stylesheet" type="text/css">

</head>
<body>
    @yield('breadcrumb')
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>    
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>
    

    <script src="{{ asset('js/zoom.js') }}"></script>    
    <script src="{{ asset('js/code.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>


</body>
</html>