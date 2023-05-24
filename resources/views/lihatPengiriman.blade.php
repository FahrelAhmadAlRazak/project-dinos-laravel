@extends('layoutsPengiriman.masterLihatPengiriman')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Lihat Pengiriman</h1>
        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    <th>Tanggal</th>
                    <th>Kantor Tujuan</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>

                @foreach ($pengiriman as $item)
                {{-- @dd($item->dataProduk) --}}
                <tr class="bg-slate-200">
                    <td class="text-center"><a href="/lihatPengiriman/{{ $item->id }}">{{ $item->created_at }}</a></td>
                    <td class="text-center"><a href="/lihatPengiriman/{{ $item->id }}">{{ $item->kantorAdmin->nama }}</a></td>
                    <td class="text-center"><a href="/lihatPengiriman/{{ $item->id }}">{{ $item->produk->nama }}</a></td>
                    <td class="text-center"><a href="/lihatPengiriman/{{ $item->id }}">{{ $item->produk->jumlah . ' pcs' }}</a></td>
                    <td class="text-center"><a href="/lihatPengiriman/{{ $item->id }}">{{ $item->produk->harga }}</a></td>
                    <td class="text-center"><a href="/lihatPengiriman/{{ $item->id }}">{{ $item->statusPengiriman->status }}</a></td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>
</div>
</div>
@endsection