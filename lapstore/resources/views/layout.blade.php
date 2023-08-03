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
<body class="font-serif bg-slate-200">
    <header>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
    </footer>
</body>

<style>
    .slidder-img{
        height: 400px;
    }
    .text-gradient {
  --gradient-color-1: #FFA500; /* Replace with your desired colors */
  --gradient-color-2: #FF4500;

  background: linear-gradient(45deg, var(--gradient-color-1), var(--gradient-color-2));
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
}
</style>
<script>
    
</script>
</html>
