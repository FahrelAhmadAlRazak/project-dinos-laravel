@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
    <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-medium mb-4">Artikel</h1>
            </div>
            @can('admin')
            <a href="/editArtikel/{{ $artikel->id }}" class="w-0/5 h-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Edit</a>
            @endcan

        </div>


        
        
        <div>

            <div class="text-3xl font-bold mb-4">{{ $artikel->judul }}</div>
    
            <div>
                <p class="font-medium text-green ">{{ $artikel->User->nama }}</p>
            </div>
    
            <div class="text-green">{{ $artikel->created_at }}</div>
    
            <div class="container">
                <div class="">
                    <img class="w-full mb-4" src="{{ asset('img/'.$artikel->gambar) }}">
                </div>
            </div>
    
            <div>{{ $artikel->isi }}</div>
        </div>
      




    </div>
</div>

@endsection