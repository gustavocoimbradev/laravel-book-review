<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100/35">
        <header class="mx-auto w-full max-w-[1200px] px-5 flex items-center mt-6 mb-3">
            @if (Route::currentRouteName() !== 'books.index')
                <a class="text-md text-gray-700 me-3" href="{{ url()->previous() }}"><-</a>
            @endif
            <h1 class="text-xl font-medium text-gray-700">@yield('title')</h1>
        </header>
        <main class="mx-auto w-full max-w-[1200px] px-5">
            @yield('content')
        </main>
    </body>
</html>
