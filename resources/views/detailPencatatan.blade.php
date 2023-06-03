@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Lihat Pencatatan</h1>
        <div class="mb-4">
            <p class="text-2xl mb-4">Pengeluaran Bahan Baku: Rp. {{ number_format($pencatatan->pengeluaran_bahan_baku) }}</p>
            <p class="text-2xl mb-4">Pengeluaran Produksi: Rp. {{ number_format($pencatatan->pengeluaran_produksi) }}</p>
            <p class="text-2xl mb-4">Pengeluaran Kemasan: Rp. {{ number_format($pencatatan->pengeluaran_kemasan) }}</p>
            <p class="text-2xl mb-4">Pengeluaran Transportasi: Rp. {{ number_format($pencatatan->pengeluaran_transportasi) }}</p>
            <p class="text-2xl mb-4">Pengeluaran Gaji Pegawai: Rp. {{ number_format($pencatatan->pengeluaran_gaji) }}</p>
            <p class="text-2xl mb-4">Pengeluaran Lain-lain: Rp. {{ number_format($pencatatan->pengeluaran_lainnya) }}</p>
            <p class="text-2xl mb-4">Pemasukan: Rp. {{ number_format($pencatatan->pemasukan) }}</p>
        </div>
        <div>
            <p class="text-2xl font-bold">Profit</p>
            <p class="text-2xl">Rp. {{ number_format($pencatatan->profit) }}</p>
        </div>
    </div>
</div>
@endsection
