<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'LapStore')</title>


</head>
<body class="">
    <header>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
    </footer>
</body>
</html>
