<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

        <!-- CSS Libraries -->
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
        <!-- General CSS Files -->
        <script src="{{ mix('/js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body>
        @routes
        @inertia
        <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
        <script src="{{asset('assets/modules/popper.js')}}"></script>
        <script src="{{asset('assets/modules/tooltip.js')}}"></script>
        <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/modules/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
    </body>
</html>
