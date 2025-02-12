<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $title ?? 'Workopia | Find a job' }}</title>
</head>

<body class="bg-gray-100">
    <x-header />
    @if (request()->routeIs('home'))
        <x-hero />
        <x-top-banner />
    @endif
    <main class="container mx-auto p-4 mt-4">
        {{ $slot }}
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
