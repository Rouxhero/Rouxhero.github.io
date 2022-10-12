<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GiveMeCoffee</title>
        <link rel="icon" href="/images/logo.svg" type="image/svg type">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="/css/app.css">
        <!-- Scripts -->
        <script src="/js/jquery-3.6.0.min.js" defer></script>
       <script src="js/app.js"></script>
    </head>
    <body>
        @include('components.modale')
        @include('components.loading')
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
