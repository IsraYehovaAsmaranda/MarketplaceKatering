<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>Marketplace Katering</title>
</head>

<body class="font-sans antialiased bg-gray-100">
    <x-header></x-header>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
