<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
    @if (Auth::check())
    Dashboard
    @else
    Login
    @endif
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @guest
    @livewire('user.login')
    @endguest
    @auth
    @include('dashboard')
    @endauth
</body>
@livewireScripts

</html>