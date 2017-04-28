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


    {{-- <link rel="stylesheet" href="{{ url('css/dataTables.bootstrap.css') }}"> --}}
    <script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    



    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/select2.min.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>
    <script src="{{ asset('js/angular-1-2-32.min.js') }}"></script>
    <script src="{{ asset('js/angular/app.js') }}"></script>

    <style>
        @font-face {
            font-family: ubuntu;
            src: url({{ asset('font/Ubuntu/Ubuntu-Regular.ttf') }});
        }
        body{
            background-image: url({{ asset('images/Sativa.jpg') }});
            color: #737371;
            font-family: ubuntu;
        }
        h1, h2, h3, h4, h5{
            color: #737371;
            margin: 0;
        }
        a{
            color: #737371;
        }
        a:hover{
            color: #737371;
        }
        header{
            z-index: 100;
            margin-bottom: 20px;
            border-bottom: 4px solid #DE6262;
            height: 64px;
            position: fixed;
            width: 100%;
        }
        header h1{
            margin-top: 10px;
            margin-left: 20px;
        }
        header h1 a:hover,
        header h1 a:focus,
        header h1 a:active{
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
   @include ('elements.header')
   <div class="wrapper">
    @include ('elements.sidebar')
    <div class="container-fluid">
        <div class="tree">
            @if (isset($tree))
            <span class="glyphicon glyphicon-menu-left roman-txt"></span> <a href="#" id="kembali" class="roman-txt">Kembali</a>
            @endif
            <div class="right">
                <span class="glyphicon glyphicon-home"></span>
                @if (isset($tree))
                {!! $tree !!}
                @endif
            </div>
        </div>
        <div class="container-app" style="padding: 15px;">
            @yield('content')
        </div>
        @include('elements.footer')
    </div>
</div>
<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>
<style>
    .container-app{
        min-height: calc(100vh - 159px);
    }
    .container-fluid{
        /*position: relative;*/
        /*z-index: -100;*/
        padding-left: 300px;
        padding-right: 0;
        padding-top: 0px;
    }
</style>
