<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La tiendita de Agustin - {{ $Section }} </title>
</head>

<body>
    {{-- @guest
        <a href="{{ url()->route('login') }}"> Loguearse</a>
        <a href="{{ url()->route('register') }}"> Registrarse</a>
    @endguest --}}
    {{-- @auth
        <a href="{{ url()->route('home') }}" > Inicio</a> --}}
        <a href="{{ url()->route('productos') }}" > Productos</a>
        {{-- <a href="{{ url()->route('logout') }}" > Cerrar Sesion</a>
    @endauth --}}
</body>

</html>