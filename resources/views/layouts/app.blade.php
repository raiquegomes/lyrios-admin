<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.16/dist/css/tempus-dominus.min.css" crossorigin="anonymous">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <script src="https://kit.fontawesome.com/62d093a34b.js" crossorigin="anonymous"></script>

        @vite(['resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>

            @livewire('navigation-menu')

            <div class="content-wrapper {{ request()->routeIs('dashboardTask') ? 'kanban' : ''}}">
                @if (isset($header))
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>{{ $header }}</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $header }}</li>
                          </ol>
                        </div>
                      </div>
                    </div><!-- /.container-fluid -->
                  </section>
                @endif

                <section class="content {{ request()->routeIs('dashboardTask') ? 'pb-3' : ''}}">
                    <div class="container-fluid h-100">
                        {{ $slot }}
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <strong>Copyright &copy; 2023 <a href="{{ route('dashboard') }}">Liryos Store</a>.</strong>
                Todos os direitos reservados
                <div class="float-right d-none d-sm-inline-block">
                  <b>Versão</b> 1.0.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
        @stack('modals')
        @livewireScripts
        
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.16/dist/js/tempus-dominus.min.js" crossorigin="anonymous"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('plugins/jquery-mask/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mask/jquery.maskMoney.min.js') }}"></script>
        <script>

          $('#form').on('keypress',function(event){
            //Tecla 13 = Enter
            if(event.which == 13) {
              //cancela a ação padrão
              event.preventDefault();
            }
          });    
          $('.money').mask('#.##0,00', {reverse: true});
          $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
          })
          $('#price').maskMoney();
      </script>
    </body>
</html>
