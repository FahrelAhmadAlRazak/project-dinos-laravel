@extends('layoutsDashboard.masterDashboard')

@section('content')

@can('admin')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">

    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Pengiriman</h1>

        <div class="flex flex-col lg:flex-row lg:gap-2">
            <a class="w-1/4 h-24 bg-admin-secondary hover:opacity-90 py-1 rounded-lg text-white flex items-center justify-center text-2xl font-medium" href="{{ route('tambahPengiriman') }}">Tambah</a>
            <a class="w-1/4 h-24 bg-admin-secondary hover:opacity-90 py-1 rounded-lg text-white flex items-center justify-center text-2xl font-medium" href="{{ route('lihatPengiriman') }}">Lihat</a>
        </div>
        
            


            {{-- <a href="{{ route('tambahPengiriman') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4" align="center">Tambah</h1>
                </div>
            </a>

            <a href="{{ route('lihatPengiriman') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4" align="center">Lihat</h1>
                </div>
            </a> --}}


        {{-- </div> --}}
    </div>

</div>    
@endcan

@can('mitra')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">

    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Pengiriman</h1>
        <div class="flex flex-col lg:flex-row lg:gap-2">
            <a class="w-1/4 h-24 bg-admin-secondary hover:opacity-90 py-1 rounded-lg text-white flex items-center justify-center text-2xl font-medium" href="{{ route('tambahPengiriman') }}">Tambah</a>
            <a class="w-1/4 h-24 bg-admin-secondary hover:opacity-90 py-1 rounded-lg text-white flex items-center justify-center text-2xl font-medium" href="{{ route('lihatPengiriman') }}">Lihat</a>
        </div>
        

        {{-- <div class="h-1/2 flex flex-col lg:flex-row lg:gap-2">

            <a href="{{ route('tambahPengiriman') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4" align="center">Tambah</h1>
                </div>
            </a>

            <a href="{{ route('lihatPengiriman') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4" align="center">Lihat</h1>
                </div>
            </a>


        </div> --}}
    </div>

</div>
@endcan


</div>
</div>



@endsection