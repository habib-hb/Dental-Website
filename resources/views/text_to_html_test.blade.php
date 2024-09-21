<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body>

        @if ($form_data)
            <p>{!! $form_data !!}</p>
        @endif



        @livewireScripts
    </body>

</html>
