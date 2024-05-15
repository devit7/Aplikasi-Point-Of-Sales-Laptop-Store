<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> --}}
    @vite('resources/css/app.css')
    <title>
        @yield('title')
    </title>
    @stack('styles')
</head>

<body class="bg-[#e9e9f0]">
    <div class="flex flex-row bg-[#131432]" >
        <x-admin_sidebar />
        <main class="bg-[#131432] w-full ml-[280px] min-h-screen">
            @yield('content')
        </main>
    </div>
    {{-- <script src="bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}
    @stack('scripts')
</body>

</html>
