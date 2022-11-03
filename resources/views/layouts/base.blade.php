<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ env('APP_NAME') }} </title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app.e4ecde61.css') }}">
    <script src="{{ asset('build/assets/app.33e4bc84.js') }}"></script>
</head>
<body>
    
    @yield('content')

</body>
</html>