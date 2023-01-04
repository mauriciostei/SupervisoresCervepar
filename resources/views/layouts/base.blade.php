<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ env('APP_NAME') }} </title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app.d14aefc4.css') }}">
    <script src="{{ asset('build/assets/app.33e4bc84.js') }}"></script>
</head>
<body>
    
    @yield('content')
    
    <img 
        {{-- src="https://images.unsplash.com/photo-1528312635006-8ea0bc49ec63?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80"  --}}
        src="https://images.unsplash.com/photo-1641762557527-97c36271e2f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
        class="position-absolute top-0 start-0 vh-100 vw-100"
        id="backgroundImage"
    />

</body>

</html>