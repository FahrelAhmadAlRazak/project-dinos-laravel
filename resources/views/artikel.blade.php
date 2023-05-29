@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-medium mb-4">Artikel</h1>
            </div>
            @can('admin')
            <a href="{{ route('showTambahArtikel') }}" class="w-0/5 h-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Tambah</a>
            @endcan

        </div>


        <!-- <div class="flex border-art">
            <div class="img-art-content">
                <img class="img-art" src="img/artikel-singkong.png">
            </div>
            <div class="text-art-content">
                <h1 class="text-3xl font-medium text-green">Harga Singkong Masih Stabil!</h1>
                <p>22/05/2023, 02.14 WIB</p>
                <p>Harga singkong di Kabupaten Jember pada Senin 22 Mei 2023 masih stabi....</p>
                <a class="text-dec-ul text-italic float-right mt-2" href="#">selengkapnya</a>
            </div>
        </div> -->
        @foreach ($artikel as $item)
        <div class="flex border-art">
            <div class="img-art-content">
                
                <img class="img-art" src="{{ asset('img/'.$item->gambar) }}">
                
            </div>
            <div class="text-art-content w-full">
               
                <h1 class="text-3xl font-medium text-green">{{ $item->judul }}</h1>
               
               
                <p>{{ $item->created_at }}</p>
                
               
                <p class="shorten">{{ $item->isi }}</p>
               
                <a class="text-dec-ul text-italic float-right mt-2 mr-c" href="/detailArtikel/{{ $item->id }}">selengkapnya</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection