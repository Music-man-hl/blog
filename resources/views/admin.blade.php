<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> </title>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/layui/css/layui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body class="white-content1">

<div id="app"></div>

<!-- Scripts -->
<script src="{{ asset('vendor/layui/layui.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/admin-all.js') }}"></script>
</body>
</html>
