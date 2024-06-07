<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus"/>
    <title>Student Extra Curricular Activity Management</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{asset('back-end/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/lib/owl.carousel.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('back-end/css/lib/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('back-end/css/lib/weather-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('back-end/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('back-end/css/lib/sweetalert/sweetalert.css')}}" rel="stylesheet">
    
</head>

<body>
@include('layouts.sidebar')
@include('layouts.header')
@yield('content')
@include('layouts.footer')
<!-- jquery vendor -->
<script src="{{asset('back-end/js/lib/jquery.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/jquery.nanoscroller.min.js')}}"></script>
<!-- nano scroller -->
<script src="{{asset('back-end/js/lib/menubar/sidebar.js')}}"></script>
<script src="{{asset('back-end/js/lib/preloader/pace.min.js')}}"></script>
<!-- sidebar -->

<script src="{{asset('back-end/js/lib/bootstrap.min.js')}}"></script>
<script src="{{asset('back-end/js/scripts.js')}}"></script>
<!-- bootstrap -->

<script src="{{asset('back-end/js/lib/calendar-2/moment.latest.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/calendar-2/pignose.init.js')}}"></script>

<script src="{{asset('back-end/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/weather/weather-init.js')}}"></script>
<script src="{{asset('back-end/js/lib/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/circle-progress/circle-progress-init.js')}}"></script>
<script src="{{asset('back-end/js/lib/chartist/chartist.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/sparklinechart/sparkline.init.js')}}"></script>
<script src="{{asset('back-end/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>

<script src="{{asset('back-end/js/lib/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('back-end/js/lib/sweetalert/sweetalert.init.js')}}"></script>
<!-- scripit init-->
<script src="{{asset('back-end/js/dashboard2.js')}}"></script>
</body>

</html>
