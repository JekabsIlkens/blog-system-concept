<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog System</title>

        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    </head>

    <body class="h-full bg-neutral-100">
        <div class="min-h-full">

            @include('layouts.navbar')

            <main> {{ $slot }} </main>

        </div>
    </body>
</html>
