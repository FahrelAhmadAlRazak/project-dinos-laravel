@extends('layoutsPengajuan.masterDataPengajuanMitra')

@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Data Pengajuan</h1>
        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    <th>Id Pengajuan</th>
                    <th>Nama Usaha</th>
                    <th>Alamat Tempat Usaha</th>
                    <th> No Telpon Perusahaan</th>
                    <th>Nama Produk yang Diajukan</th>
                    <th>Jumlah Produk yang Diajukan</th>
                    <th>Harga Produk yang Diajukan</th>
                    <th>Deskripsi Produk yang Diajukan</th>
                    <th>Gambar Produk</th>
                </tr>


                @foreach ($dataDetailPengajuan as $item)
                {{-- @dd($item->dataProduk) --}}
                <tr>
                    <td><a href="/detail_pengajuan/{{ $item->id_detail_pengajuan }}">{{ $item->id_detail_pengajuan }}</a></td>
                    <td><a href="#">{{ $item->dataPengajuan->dataPerusahaan->nama_perusahaan }}</a></td>
                    <td><a href="#">Jalan {{ $item->dataPengajuan->dataPerusahaan->jalan }}, {{ $item->dataPengajuan->dataPerusahaan->dataKota->nama }}, {{ $item->dataPengajuan->dataPerusahaan->dataProvinsi->nama }}</a></td>
                    <td><a href="#">{{ $item->dataPengajuan->dataPerusahaan->notelp_perusahaan }}</a></td>
                    <td><a href="#">{{ $item->dataProduk->nama_produk }}</a></td>
                    <td><a href="#">{{ $item->jumlah_produk }}</a></td>
                    <td><a href="#">{{ $item->dataProduk->harga_produk }}</a></td>
                    <td><a href="#">{{ $item->id_detail_pengajuan }}</a></td>
                    {{-- <td>{{  $item->dataProduk->gambar_produk }}</td> --}}
                    <td><img src="{{ $item->dataProduk->gambar_produk }}" alt="image"></td>
                   
                    
                </tr>
                
                

                @endforeach
                










            </table>
        </div>

    </div>
</div>
</div>
</div>



@endsection