@extends('layoutsDashboard.masterDashboard')
@section('content')

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Pencatatan</h1>

        <div class="h-1/2 flex flex-col lg:flex-row lg:gap-2">
            
            <a href="{{ route('show_tambah_pencatatan') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4 text-center">Tambah</h1>
                </div>
            </a>

           
            
            
            <a href="{{ route('lihatPencatatan') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4 text-center">Lihat</h1>
                </div>
            </a>
           
            
           
        </div>
    </div>
</div>
@endsection