@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Lihat Pencatatan</h1>
        <div class="mb-4">
            <p class="">Pengeluaran Bahan Baku :{{ $pencatatan->pengeluaran_bahan_baku }} </p>
            <p class="">Pengeluaran Produksi :{{ $pencatatan->pengeluaran_produksi }} </p>
            <p class="">Pengeluaran Kemasan :{{ $pencatatan->pengeluaran_kemasan }} </p>
            <p class="">Pengeluaran Transportasi :{{ $pencatatan->pengeluaran_kemasan }} </p>
            <p class="">Pengeluaran Gaji Pegawai :{{ $pencatatan->pengeluaran_gaji }} </p>
            <p class="">Pengeluaran Lain-lain :{{ $pencatatan->pengeluaran_lainnya }} </p>
            <p class="">Pemasukan :{{ $pencatatan->pemasukan }} </p>
        </div>
        <div>
            <p>Profit</p>
            {{ $pencatatan->profit }}
        </div>
    </div>
</div>
@endsection