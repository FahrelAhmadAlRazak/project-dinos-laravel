
@extends('layoutsPengajuan.masterDataPengajuan')

@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Data Pengajuan</h1>
        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    <th>Nama Usaha</th>
                    <th>Nama Produk yang Diajukan</th>
                    <th>Jumlah Produk yang Diajukan</th>
                    <th>Harga Produk yang Diajukan</th>
                    <th>Gambar Produk</th>
                </tr>


                @foreach ($pengajuan as $item)
                {{-- @dd($item->dataProduk) --}}
                <tr class="bg-slate-200">
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->perusahaan->nama }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->produk->nama }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->produk->jumlah }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->produk->harga }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}"><img src="{{ asset('img/'.$item->produk->gambar) }}" alt="{{ $item->produk->gambar }}"></a></td>

                </tr>
                
                

                @endforeach
                
                










            </table>
        </div>

    </div>
</div>
</div>
</div>



@endsection