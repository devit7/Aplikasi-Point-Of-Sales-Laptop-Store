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
</head>

<body class="bg-[#e9e9f0]">
    <div class="flex flex-row bg-[#131432]" >
        <main class="bg-[#1C1D42] w-full ml-[280px] min-h-screen">
            @yield('content')
        </main>
    </div>
</body>

</html>
