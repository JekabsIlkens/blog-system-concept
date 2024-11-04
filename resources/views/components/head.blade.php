<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog System</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-full">
        <div class="min-h-full">
            <x-navbar />