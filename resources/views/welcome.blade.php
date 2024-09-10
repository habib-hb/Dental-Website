<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



        @vite('resources/css/app.css')
        @livewireStyles
    </head>

    <body class="{{ session('theme_mode') == 'light' ? 'bg-[#EFF9FF]' : 'bg-[#070707]'}}">


        <livewire:homepage_wire/>

        @livewireScripts
    </body>

</html>
