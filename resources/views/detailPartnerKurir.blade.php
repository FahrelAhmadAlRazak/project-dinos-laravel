@extends('layoutsPartner.masterDetailPartnerKurir')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Detail Data Akun</h1>

        <table class="border w-full">

            <tr>
                <td class="w-1/3 px-4 py-3">Id Mitra</td>
                {{-- @dd($dataAkunKurir->id_kurir) --}}
                <td>{{ $dataAkunKurir->id_kurir }}</td>

            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Nama</td>

                <td>{{ $dataAkunKurir->nama }}</td>

            </tr>
            <tr>
                <td class="w-1/3 px-4 py-3">Username</td>

                <td>{{ $dataAkunKurir->username }}</td>

            </tr>
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Email</td>

                <td>{{ $dataAkunKurir->email }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Nomer Identitas</td>

                <td>{{ $dataAkunKurir->nomor_identitas }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>




            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Jalan</td>

                <td>{{ $dataAkunKurir->jalan }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr>
                <td class="w-1/3 px-4 py-3">Kota</td>

                <td>{{ $dataAkunKurir->dataKota->nama }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Provinsi</td>

                <td>{{ $dataAkunKurir->dataProvinsi->nama }}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>

            <tr>
                <td class="w-1/3 px-4 py-3">No Telepon</td>

                <td>{{ $dataAkunKurir->no_telpon }}</td>

                <!-- <td>: 082345678901</td> -->
            </tr>
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Tanggal Lahir</td>

                <td>{{ $dataAkunKurir->tanggal_lahir }}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>

            <tbody>

            </tbody>
        </table>

        @endsection