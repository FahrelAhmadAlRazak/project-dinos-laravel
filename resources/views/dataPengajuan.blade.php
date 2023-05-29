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
                    @can('mitra')
                    <th>Aksi</th>
                    @endcan
                </tr>


                @foreach ($pengajuan as $item)
                {{-- @dd($item->dataProduk) --}}
                <tr class="bg-slate-200">
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->perusahaan->nama }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->produk->nama }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->produk->jumlah }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}">{{ $item->produk->harga }}</a></td>
                    <td class="text-center"><a href="/detail_pengajuan/{{ $item->id }}"><img src="{{ asset('img/'.$item->produk->gambar) }}" alt="{{ $item->produk->gambar }}"></a></td>
                    @can('mitra')
                    <td class="text-center w-0/5"><img src="{{ asset('images/delete.svg') }}" data-modal-target="batal-{{ $item->id }}" data-modal-toggle="batal-{{ $item->id }}" class="batal bg-admin-secondary hover:opacity-90 rounded-lg w-10 mx-auto" role="button" alt=""></td>
                    @endcan

                </tr>
                @endforeach
            </table>
        </div>
        @if(session('success'))
        <div id="success">
            <p class="mt-3 bg-admin-secondary text-white px-8 py-2 rounded-lg"> {{ session('success')}}</p>

        </div>

        @endif

        @if(session('error'))
        <div id="error">
            <p class="mt-3 bg-red-700 text-white px-8 py-2 rounded-lg"> {{ session('error')}}</p>

        </div>

        @endif

        @foreach ($pengajuan as $item)
        <div id="batal-{{ $item->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
                <h3 class="text-xl mb-6">"Batalkan Pengajuan ?"</h3>
                <div class="flex gap-4 w-2/3">
                    <a id="iya" class="w-1/2 bg-green-700 text-white text-center py-2" href="{{ route('batal_pengajuan', $item->id) }}">Iya</a>
                    <button class="w-1/2 bg-red-700 text-white py-2" id="noLogout" data-modal-target="batal-{{ $item->id }}" data-modal-toggle="batal-{{ $item->id }}">Tidak</button>
                </div>
            </div>
        </div>
        @endforeach
        <div id="notificationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
                <h3 class="text-xl text-center">"Data tidak dapat dihapus"</h3>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

        <script>
            const _notificationModal = new Modal($('#notificationModal')[0]);
            document.addEventListener('DOMContentLoaded', function() {
                var btn = document.getElementById('iya');

                btn.onclick = function() {
                    _notificationModal.show(); // Display the notificationModal
                };
            });

            setTimeout(function() {
                var element = document.getElementById('success');
                element.classList.add('fade-out');
            }, 3000); // Time-out setelah 3 detik (3000 milidetik)

            setTimeout(function() {
                var element = document.getElementById('error');
                element.classList.add('fade-out');
            }, 3000); // Time-out setelah 3 detik (3000 milidetik)
        </script>



    </div>
</div>
@endsection