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

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Inventory
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li>
                    Master
                    <ul>
                        <li><a href="{{ url('barang') }}">Barang</a></li>
                        <li><a href="{{ url('supplier') }}">Supplier</a></li>
                        <li><a href="{{ url('outlet') }}">Outlet</a></li>
                        <li><a href="{{ url('kategori') }}">Category</a></li>
                        <li><a href="{{ url('unit') }}">Unit</a></li>
                    </ul>
                </li>
                <li>
                    Transaksi
                    <ul>
                        <li><a href="{{ url('barangmasuk') }}">Barang Masuk</a></li>
                        <li><a href="{{ url('barangkeluar') }}">Barang Keluar</a></li>
                        <li><a href="{{ url('barangrusak') }}">Barang Rusak/Retur</a></li>
                    </ul>
                </li>
                <li>
                    Laporan
                    <ul>
                        <li><a href="{{ url('reportbarangmasuk') }}">Lap. Barang Masuk</a></li>
                        <li><a href="{{ url('reportbarangkeluar') }}">Lap. Barang Keluar</a></li>
                        <li><a href="{{ url('reportbarangrusak') }}">Lap. Barang Rusak</a></li>
                    </ul>
                </li>
                <li>
                    Admin System
                    <ul>
                        <li><a href="{{ url('user') }}">Management User</a></li>
                        <li><a href="{{ url('user/password') }}">Ganti Password</a></li>
                        <li><a href="{{ url('logout') }}">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
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