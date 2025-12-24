<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Djingga Media Teknokreatif</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins">
    <div class="sticky top-0 z-50">
        @include('components.header')
    </div>
    @php
        $showSidebar = in_array(Route::currentRouteName(), ['profile.index', 'schedule.index', 'transaction.index']);
    @endphp
    <main class="@if($showSidebar) flex @endif">
        @if($showSidebar)
            <aside class="w-64 min-h-screen mt-20 mx-4 mb-4">
                @include('components.user-sidebar')
            </aside>
            <div class="flex-1 min-h-screen mt-20 mx-4 mb-4">
                @yield('container')
            </div>
        @else
            @yield('container')
        @endif
    </main>
    @include('components.footer')
</body>

</html>
