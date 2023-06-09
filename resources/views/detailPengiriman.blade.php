@extends('layoutsDashboard.masterDashboard')
@section('content')


<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Detail Pengiriman</h1>

        <table class="border w-full">
            <tr>
                <td class="w-1/3 px-4 py-3">Tanggal</td>

                <td>{{ $pengiriman->created_at}}</td>

                <!-- <td>: admin@mail.com</td> -->
            </tr>
            @can('kurir')
                <tr class="bg-slate-200">
                    <td class="w-1/3 px-4 py-3">Alamat</td>
                    @if ($pengiriman instanceof \App\Models\PengirimanAdmin)
                        <td>{{ $pengiriman->kantorAdmin->nama }}</td>
                    @elseif ($pengiriman instanceof \App\Models\PengirimanToko)
                        <td>{{ $pengiriman->toko->nama }}</td>
                    @endif
                </tr>
            @endcan


            @can('mitra')
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Kantor Admin</td>

                <td>{{ $pengiriman->kantorAdmin->nama}}</td>

                <!-- <td>: 082345678901</td> -->
            </tr>
            @endcan

            @can('admin')
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Toko</td>

                <td>{{ $pengiriman->toko->nama}}</td>

                <!-- <td>: 082345678901</td> -->
            </tr>
            @endcan

            @can('mitra')
            <tr>
                <td class="w-1/3 px-4 py-3">Alamat Kantor</td>

                <td>{{$pengiriman->kantorAdmin->jalan}}, {{ $pengiriman->kantorAdmin->kota->nama}}, {{ $pengiriman->kantorAdmin->provinsi->nama}}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            @endcan
            @can('admin')
            <tr>
                <td class="w-1/3 px-4 py-3">Alamat toko</td>

                <td>{{$pengiriman->toko->jalan}}, {{ $pengiriman->toko->kota->nama}}, {{ $pengiriman->toko->provinsi->nama}}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            @endcan
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Nama Produk</td>

                <td>{{ $pengiriman->produk->nama }}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            
            @can('admin')
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Jumlah Produk</td>

                <td>{{$pengiriman->jumlah . ' pcs'}}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            @endcan

            @can('mitra')
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Jumlah Produk</td>

                <td>{{$pengiriman->produk->jumlah . ' pcs'}}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            @endcan

            @can('kurir')
            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Jumlah Produk</td>

                
                @if ($pengiriman instanceof \App\Models\PengirimanAdmin)
                <td>{{$pengiriman->produk->jumlah . ' pcs'}}</td>
                @elseif ($pengiriman instanceof \App\Models\PengirimanToko)
                <td>{{$pengiriman->jumlah . ' pcs'}}</td>
                @endif

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            @endcan

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Harga Produk</td>
                <td>Rp. {{ number_format($pengiriman->produk->harga) }}</td>
                <!-- <td>: 2000-01-01</td> -->
            </tr>
            
            

            <tr class="bg-slate-200">
                <td class="w-1/3 px-4 py-3">Status</td>

                <td>{{$pengiriman->statusPengiriman->status}}</td>

                <!-- <td>: 2000-01-01</td> -->
            </tr>
            <tbody>

            </tbody>
        </table>

        @can('kurir')
        <div class="mt-8 flex justify-end">
            <div class="flex gap-4 w-1/3">
                <button class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center" data-modal-target="statu_pengiriman" data-modal-toggle="statu_pengiriman">Status</button>
                <!-- <button class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center gap-1" id="logoutBtn"><img class="w-5" src="/test/images/logout.svg" alt="">Logout</button> -->
            </div>
        </div>

        @endcan

        <div id="statu_pengiriman" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/2 max-w-2xl max-h-full flex flex-col items-center">
                <a>
                    <p data-modal-target="statu_pengiriman" data-modal-toggle="statu_pengiriman" style="position: absolute; top: 4px; right: 16px; cursor: pointer;">X</p>
                </a>
                <h2 class="text-2xl font-bold mb-4">Ubah Status Pengiriman</h2>
                <!-- <h3 class="text-xl mb-6">"Batalkan Pengajuan ?"</h3> -->
                <div class="flex gap-4 w-2/3">
                
                    <a id="iya" class="w-1/2 bg-green-700 text-white text-center py-2 rounded-lg" href="/sedang_dikirim/{{ $pengiriman->id }}">Sedang dikirim</a>
                    <a id="iya" class="w-1/2 bg-green-700 text-white text-center py-2 rounded-lg" href="/sudah_dikirim/{{ $pengiriman->id }}">Sudah dikirim</a>
                    <!-- <button class="w-1/2 bg-red-700 text-white py-2" id="noLogout" data-modal-target="statu_pengiriman" data-modal-toggle="statu_pengiriman">Tidak</button> -->
                </div>
            </div>
        </div>

    </div>
</div>

@endsection