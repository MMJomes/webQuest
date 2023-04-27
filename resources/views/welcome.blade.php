<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body>
    @include('navbar')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</body>

</html>
