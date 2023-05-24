@extends('layoutsDashboard.masterDashboard')

@section('content')

@can('admin')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">

    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Pengiriman</h1>

        <div class="h-1/2 flex flex-col lg:flex-row lg:gap-2">

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


        </div>
    </div>

</div>    
@endcan

@can('mitra')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">

    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Pengiriman</h1>

        <div class="h-1/2 flex flex-col lg:flex-row lg:gap-2">

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


        </div>
    </div>

</div>
@endcan

@can('kurir')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">

    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Pengiriman</h1>

        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>Nama Mitra</th>
                    <th>Alamat Tujuan</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Status</th>
                </tr>
                <tr>
                    
                </tr>
            </table>
        </div>
    </div>

</div>
@endcan
</div>
</div>



@endsection