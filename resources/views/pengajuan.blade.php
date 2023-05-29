@extends('layoutsPengajuan.masterPengajuan')

@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Pengajuan</h1>

        <div class="h-1/2 flex flex-col lg:flex-row lg:gap-2">
            
            <a href="{{ route('show_pengajuan') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4 text-center">Data Pengajuan</h1>
                </div>
            </a>

           
            
            @can('mitra')
            <a href="{{ route('buat_pengajuan') }}" class="lg:w-1/2 border">
                <div>
                    <h1 class="text-3xl font-medium mb-4 text-center"> Buat Pengajuan</h1>
                </div>
            </a>
            @endcan
            
           
        </div>
    </div>
</div>
</div>
</div>



@endsection