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
                    <th>Total Pengeluaran</th>
                    <th>Pemasukan</th>
                </tr>
                @foreach ($pencatatan as $item)
                <tr class="bg-slate-200">
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->pengeluaran_bahan_baku) }}</a></td>
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->pengeluaran_produksi) }}</a></td>
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->pengeluaran_kemasan) }}</a></td>
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->pengeluaran_transportasi) }}</a></td>
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->pengeluaran_gaji) }}</a></td>
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->pengeluaran_lainnya) }}</a></td>
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->total_pengeluaran) }}</a></td>
                    <td class="text-center"><a href="/detailPencatatan/{{ $item->id }}">Rp. {{ number_format($item->pemasukan) }}</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
