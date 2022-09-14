
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Michu Werefa') }}</title>

<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />

<!-- Custom fonts for this template-->
<link href="{{ asset('sb-theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('sb-theme/css/sb-admin-2.css')}}" rel="stylesheet">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
