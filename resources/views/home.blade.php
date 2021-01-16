<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Majoo Teknologi Indonesia') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- BootStrap -->
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/all.css')}}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>

        <script src="{{url('js/all.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>

<!-- <link rel="stylesheet" href="{{url('css/extra-css.css')}}"> -->

        <style>
                body{
                    height: 100%;
                    width: 100%;
                    background-size: cover;
                    align-items: center;
                    justify-content: center;
                }

        </style>


    </head>

    <body>

        @include('partials.nav')

        @yield('content')

        @include('partials.footer')
    </body>

    @yield('scripts')

</html>