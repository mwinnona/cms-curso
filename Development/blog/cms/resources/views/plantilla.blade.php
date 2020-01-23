<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog del viajero | CMS</title>
     <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    {{-- BOOTSTRAP 4 --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	{{-- CSS AdminLTE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.min.css">

	{{-- Fontawesome --}}
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

	{{-- google fonts --}}
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- AdminLTE App -->
    <script src="{{ url('/') }}/js/plugins/adminlte.js"></script>

    {{-- jquery.overlayScrollbars.min.js --}}
	<link rel = "stylesheet" href="{{ url('/') }}/css/plugins/OverlayScrollbars.min.css">
    <!-- overlayScrollbars -->
    <script src="/js/plugins/jquery.overlayScrollbars.min.js"></script>

    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/jquery-ui.min.js"></script>
    <script src="{{ url('/') }}/js/plugins/jquery.min.js"></script>


</head>
<body class = "hold-transition sidebar layout-fixed">
    <div class="wrappen">
    @include('modulos.header')
    @include('modulos.sidebar')
    @yield('content')
    @include('modulos.footer')
    ALoha
    </div>

    
</body>
</html>