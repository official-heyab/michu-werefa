<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('admin.inc.head')

</head>

<body class="bg-gradient-primary">

    <div class="container">
        {{ $slot }}
    </div>
    <!-- /.container -->

    @include('admin.inc.scripts')

    </body>

</html>
