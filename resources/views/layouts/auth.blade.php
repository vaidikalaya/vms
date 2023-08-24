<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>