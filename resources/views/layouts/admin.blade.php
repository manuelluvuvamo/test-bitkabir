<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="font-size:0.875em">

<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/img/AdminLTELogo.png') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/jquery-ui/jquery-ui.css') }}">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->

    <style>
        .loader {
            position: absolute;
            top: 0px;
            right: 0px;
            width: 100%;
            height: 100%;
            background-color: #eceaea;
            background-size: 50px;
            background-repeat: no-repeat;
            background-position: center;
            z-index: 10000000;
            opacity: 0.4;
            filter: alpha(opacity=40);
        }

        .select2-container .select2-selection--single {
            height: 34px !important;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: normal !important;
            /* Remove o line-height */
            padding-left: 8px;
            /* Adiciona espaçamento */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 34px !important;
            top: 0;
            /* Remove qualquer deslocamento */
            display: flex;
            align-items: center;
        }

        .select2-selection__choice * {
            color:#000!important;
        }
        .select2-selection__choice{
            color:#000!important;
        }
    </style>

    @livewireStyles

</head>

<body class="hold-transition sidebar-mini layout-fixed" style="font-size: 1em">
    <div class="wrapper">

        @livewire('layouts.admin-top-nav-bar')

        @livewire('layouts.admin-side-bar')

        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> @if (env('APP_ENV') == 'production' || env('APP_ENV') == 'Production' ) @version('version-only') @else  @version('version'); @endif
            </div>
            <strong>Copyright &copy; {{date('Y')}}; <a href="http://manuelluvuvamo.vercel.app/" target="_blank">Manuel Luvuvamo</a></strong>
        </footer>
    </div>


    <script src="{{ asset('admin/plugins/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/i18n/pt.js') }}"></script>
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>


    @livewireScripts

    @stack('scripts')
    <script>
        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-bottom-right",
                "progressBar": true,
                "timeOut": 10000,
            };

            document.addEventListener('toast', function(event) {
                toastr[event.detail.notify](event.detail.message);
            });

        });
    </script>
</body>

</html>
