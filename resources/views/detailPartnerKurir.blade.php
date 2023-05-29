@extends('layoutsPartner.masterDetailPartnerKurir')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Detail Data Akun</h1>

        <table class="border w-full">

            <tr>
                <td class="w-1/3 px-4 py-3">Id Kurir</td>
                <td>{{ $users->id }}</td>

            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Nama</td>

                <td>{{ $users->nama }}</td>

            </tr>
            <tr>
                <td class="w-1/3 px-4 py-3">Username</td>

                <td>{{ $users->username }}</td>

            </tr>
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Email</td>

                <td>{{ $users->email }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Nomer Identitas</td>

                <td>{{ $users->no_identitas }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>




            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Jalan</td>

                <td>{{ $users->jalan }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr>
                <td class="w-1/3 px-4 py-3">Kota</td>

                <td>{{ $users->kota->nama }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Provinsi</td>

                <td>{{ $users->provinsi->nama }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr>
                <td class="w-1/3 px-4 py-3">No Telepon</td>

                <td>{{ $users->no_telepon }}</td>

                <!-- <td>: 082345678901</td> -->
            </tr>
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Tanggal Lahir</td>

                <td>{{ $users->tanggal_lahir }}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>

            <tbody>

            </tbody>
        </table>

        @endsection