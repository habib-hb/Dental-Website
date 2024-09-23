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



        <h1>Working</h1>

        <img src="{{$post->blog_image}}" class="h-[200px] w-[200px]" alt="">

        <h1>{{$post->blog_title}}</h1>
        <h1>{{$post->blog_excerpt}}</h1>

        <h1>{!!$post->blog_text!!}</h1>

        @livewireScripts
    </body>

</html>
