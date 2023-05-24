{{-- @dd(auth()->user()->datakota->nama) --}}
@extends('layoutsAkun.masterAkun')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Data Akun</h1>
       
        <table class="border w-full">

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Nama</td>

                <td>: {{ auth()->user()->nama }} </td>

            </tr>
            <tr >
                <td class="w-1/3 px-4 py-3">Username</td>

                <td>: {{ auth()->user()->username }} </td>

            </tr>
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Email</td>

                <td>:{{ auth()->user()->email }} </td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>
           
            {{-- @if(Str::length(Auth::guard('dataAkunAdmin')->user()) > 0) --}}
            <tr>
                <td class="w-1/3 px-4 py-3">Nomor Identitas</td>

                <td>:{{ auth()->user()->no_identitas }} </td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Jalan</td>

                <td>:{{ auth()->user()->jalan }} </td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr>
                <td class="w-1/3 px-4 py-3">Kota</td>
            
                <td>:{{ auth()->user()->kota->nama }} </td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Provinsi</td>

                <td>:{{ auth()->user()->provinsi->nama }} </td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr>
                <td class="w-1/3 px-4 py-3">No Telepon</td>

                <td>:{{ auth()->user()->no_telepon }} </td>

                <!-- <td>: 082345678901</td> -->
            </tr>
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Tanggal Lahir</td>

                <td>: {{ auth()->user()->tanggal_lahir }}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            
            <tbody>

            </tbody>
        </table>
        <div class="mt-8 flex justify-end">
            <div class="flex gap-4 w-1/3">
                <a href="{{ route('show_edit_akun') }}" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Edit</a>
                <!-- <button class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center gap-1" id="logoutBtn"><img class="w-5" src="/test/images/logout.svg" alt="">Logout</button> -->
            </div>
        </div>


        <div id="logoutModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
                <h3 class="text-xl mb-6">"Anda yakin ingin keluar?"</h3>
                <div class="flex gap-4 w-2/3">
                    <button class="w-1/2 bg-green-700 text-white py-2" id="iyaLogout">Iya</button>
                    <button class="w-1/2 bg-red-700 text-white py-2" id="noLogout">Tidak</button>
                </div>
            </div>
        </div>
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <script>
            const _logoutModal = logoutModal();
            $("#iyaLogout").click(() => {
                window.location.replace("/test/pages/admin/dashboard.html");
            });
            $("#logoutBtn").click(() => {
                _logoutModal.toggle();
            })
            $("#noLogout").click(() => {
                _logoutModal.toggle();
            });
        </script>
        @endsection
        </body>

        </html>