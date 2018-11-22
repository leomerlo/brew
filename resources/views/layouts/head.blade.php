<?php
/*
Este archivo va a ser nuestro template del layout general de
nuestro sitio.
La idea es que contenga todo lo que sea común a todas las 
pantallas (o la mayoría), y luego, usando lo que conocemos
_directivas_, le vamos a indicar dónde ubicar el contenido
específico de cada página.
*/
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        
        <link rel="stylesheet" href="<?= url("css/vendors.css");?>">
        <link rel="stylesheet" href="<?= url("css/app.css");?>">
        @yield('styles')
    </head>
    <body class="@yield('body-class')">