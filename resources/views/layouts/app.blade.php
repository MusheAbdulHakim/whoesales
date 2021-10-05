<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>{{ucfirst(config('app.name'))}} - {{ucwords($title ?? '')}}</title>
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    <!-- General Plugins -->
    <link href="{{asset('assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    @stack('page-css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <x-preloader />
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        @include('includes.header')
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        @include('includes.sidebar')
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Title and breadcrumb -->
            <!-- ============================================================== -->
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">{{ucwords($title ?? '')}}</h5>
                    <div class="custom-breadcrumb ml-auto">
                        <a href="{{route('dashboard')}}" class="breadcrumb">Dashboard</a>
                        <a href="#!" class="breadcrumb">{{ucwords($title ?? '')}}</a>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid scss in scafholding.scss -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <x-alerts.danger :message="$error" />
                    @endforeach
                @endif
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid scss in scafholding.scss -->
            <!-- ============================================================== -->
            <footer class="center-align m-b-30">
                All Rights Reserved by {{ucwords(config('app.name'))}}. Developed with <i class="material-icons ">favorite</i> by 
                <a href="https://github.com/MusheAbdulHakim">Mushe Abdul-Hakim</a>.
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/materialize.min.js')}}"></script>
    <script src="{{asset('assets/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Apps -->
    <!-- ============================================================== -->
    <script src="{{asset('dist/js/app.js')}}"></script>
    <script src="{{asset('dist/js/app.init.dark.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Custom js -->
    <script src="{{asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
    <!-- ============================================================== -->
    <script src="{{asset('dist/js/custom.min.js')}}"></script>
    <script>
        $('body').on('click', '.materialert .close-alert', function() {
            $(this).parent().fadeOut(300, function() {
                $(this).remove();
            });
        });
        @if(Session::has('message'))
			var type = "{{ Session::get('alert-type', 'info') }}";
			switch(type){
				case 'info':
                    toastr.info("{{ Session::get('message') }}", 'Info', { "progressBar": true });
					break;

				case 'warning':
                    toastr.warning("{{ Session::get('message') }}", 'Warning', { "progressBar": true });
					break;

				case 'success':
                    toastr.success("{{ Session::get('message') }}", 'Success', { "progressBar": true });
					break;

				case 'danger':
                    toastr.error("{{ Session::get('message') }}")
					break;
			}
		@endif
    </script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    @stack('page-js')
    <!-- ============================================================== -->
</body>

</html>