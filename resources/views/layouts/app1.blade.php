<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>GiveMeCoffee</title>
    <link rel="icon" href="/images/logo.svg" type="image/svg type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <link rel="stylesheet" href="/css/app.css">
    <script src="js/jquery-3.6.0.min.js" defer></script>
    <script src="js/app.js" defer></script>
</head>

<body>
    @include('components.modale')
    @include('components.loading')

    <div class="bg-gray-100">
            @include('components.navbar')
        <div class="pt-12">
            @yield('content')
        </div>
        <footer class="pt-10">
            @include('components.footer')
        </footer>
    </div>
</body>

</html>
