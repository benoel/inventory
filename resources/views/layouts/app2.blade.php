<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Inventory - Aplikasi inventory barang</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
        <header style="margin-bottom: 30px;">
            
        </header>
        @yield('content')
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    </body>
    </html>
    <style>
        .container-fluid{
            padding-left: 330px;
        }
        .sidebar{
            position: fixed;
            height: 100%;
            width: 300px;
            border-right: 1px solid #555;
        }
    </style>