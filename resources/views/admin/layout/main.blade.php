<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAMDES - Sampah Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins">
    <div class="sticky top-0 z-50">
        @include('components.topbar')
    </div>
    <main class="flex">
        <aside class="w-64 min-h-screen mt-20 mb-4">
            @include('components.sidebar')
        </aside>
        <div class="flex-1 min-h-screen mt-4 mx-4 mb-4">
            @yield('container')
        </div>
    </main>
</body>
</html>
