<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
    
</head>



<body class="relative">

<header class="bg-admin-primary flex justify-between items-center absolute px-6 py-3 w-screen h-24">

        <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
        
        <button data-modal-target="logoutModal" data-modal-toggle="logoutModal">Logout</button>
    </header>

    <div id="logoutModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
            <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
            <h3 class="text-xl mb-6">"Anda yakin ingin keluar?"</h3>
            <div class="flex gap-4 w-2/3">
                <a class ="w-1/2 bg-green-700 text-white text-center py-2" id="iyaLogout" href="{{route('logout')}}">Iya</a>
                <button class="w-1/2 bg-red-700 text-white py-2" id="noLogout" data-modal-target="logoutModal" data-modal-toggle="logoutModal">Tidak</button>
            </div>
        </div>
    </div>


        <!-- <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
        <img src="{{ asset('images/user.svg') }}" class="h-12" alt=""> -->
        <!-- <a href="{{route('logout')}}">Logout</a> -->
    </header>

