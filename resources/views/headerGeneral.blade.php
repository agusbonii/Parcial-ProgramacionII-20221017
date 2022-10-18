<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La tiendita de Agustin - {{ $Section }} </title>
</head>

<body>
    <a href="{{ url()->route('home') }}"> Inicio</a>
    @guest
    <a href="{{ url()->route('login') }}"> Loguearse</a>
    <a href="{{ url()->route('registrarse') }}"> Registrarse</a>
    @endguest
    @auth
    <a href="{{ url()->route('logout') }}"> Cerrar Sesion</a>
    @endauth
