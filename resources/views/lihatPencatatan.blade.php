@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Lihat Pencatatan</h1>
        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    <th>Pengeluaran Bahan Baku</th>
                    <th>Pengeluaran Produksi</th>
                    <th>Pengeluaran Kemasan</th>
                    <th>Pengeluaran Transportasi</th>
                    <th>Pengeluaran Gaji Karyawan</th>
                    <th>Pengeluaran Lain-Lain</th>
                </tr>
            </table>
        </div>

    </div>
</div>
@endsection
