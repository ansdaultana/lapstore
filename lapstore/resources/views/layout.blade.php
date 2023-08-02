<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'LapStore')</title>
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
    rel="stylesheet" />

</head>
<body class="font-serif">
    <header>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
    </footer>
</body>
</html>
