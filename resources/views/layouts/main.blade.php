<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Ruang Curhat Tanpa Batas | Bacotanmu</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="./node_modules/preline/dist/preline.js"></script> --}}
</head>

<body class="bg-primary min-h-screen flex flex-col">
    <div class="flex-grow">
        <!-- Page Heading -->
        <header class="border-b-2 border-gray-900 w-[85%] m-auto">
            @include('layouts.header')
        </header>

        <!-- Page Content -->
        <main class="w-[85%] m-auto">
            @yield('content')
        </main>
    </div>

    <!-- Page Footer -->
    <footer class="border-t-2 border-gray-900 w-[85%] m-auto mt-10">
        @include('layouts.footer')
    </footer>
</body>

</html>