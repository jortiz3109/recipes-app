<!doctype html>
<html lang="{{ app()->getLocale() }}" data-theme="winter">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/dbff5cc429.js" crossorigin="anonymous"></script>
</head>
<body>
<main id="app">
    {{ $slot }}
</main>
</body>
</html>
