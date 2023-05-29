@extends('layoutsDashboard.masterDashboard')
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
                    <th>Aksi</th>
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
                    <td class="text-center w-0/5"><img src="{{ asset('images/delete.svg') }}" data-modal-target="batal-{{ $item->id }}" data-modal-toggle="batal-{{ $item->id }}" class="batal bg-admin-secondary hover:opacity-90 rounded-lg w-10 mx-auto" role="button" alt=""></td>
                </tr>
                @endforeach

                
                
                
                
            </table>
        </div>
        @foreach ($pengiriman as $item)
        <div id="batal-{{ $item->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
                <h3 class="text-xl mb-6">"Batalkan Pengiriman ?"</h3>
                <div class="flex gap-4 w-2/3">
                    <a id="iya" class="w-1/2 bg-green-700 text-white text-center py-2" href="{{ route('batal_pengiriman', $item->id) }}">Iya</a>
                    <button class="w-1/2 bg-red-700 text-white py-2" id="noLogout" data-modal-target="batal-{{ $item->id }}" data-modal-toggle="batal-{{ $item->id }}">Tidak</button>
                </div>
            </div>
        </div>
        @endforeach
        

    </div>
</div>
</div>
</div>
@endsection