<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="bg-[#131432] flex justify-center place-items-center h-screen">
    <div class=" flex flex-row">
        <img src="foto/laptop.jpg" class=" w-96 rounded-l-lg" alt="">
        <form action="" class=" flex flex-col justify-center place-items-center gap-y-6 bg-[#1C1D42] p-4 w-96 rounded-xl">
            <h1 class=" text-white text-2xl ">Login</h1>
            <div class=" flex flex-col gap-y-4 w-80">
                <label class=" text-white" for="">Username</label>
                <input type="text">
            </div>
            <div class=" flex flex-col gap-y-4 w-80">
                <label class=" text-white" for="">Password</label>
                <input type="password" class="">
            </div>
            <input class=" bg-[#93A2CD] w-40 p-1 rounded" type="submit" value="Login">
        </form>
    </div>
</body>
</html>
