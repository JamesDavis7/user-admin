<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Admin - @yield('meta-title')</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="font-sans bg-slate-100">
    <div class="bg-gradient-to-r from-blue-900 to-slate-900 w-screen py-3 text-white shadow-2xl">
        <div class="container">
            <div class="flex justify-between items-center">
                <div class="text-2xl">
                    <a href="{{route('users.index')}}" class="hover:text-current">
                        <span class="font-semibold">User <span><span class="font-extralight">Admin</span>
                    </a>
                </div>
                <div class="text-xl font-extralight">
                    Welcome.
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <main class="container">
            <div class="text-2xl text-blue-900 font-bold my-8">
                @yield('content-title')
            </div>
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>