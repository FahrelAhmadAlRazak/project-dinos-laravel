@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Tambah Pencatatan</h1>
        <form action="{{ route('tambahPencatatan') }}" method="post" enctype="multipart/form-data" id="artikel">
            @csrf
            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="pengeluaran_bahan_baku">Pengeluaran Bahan Baku</label></div>
                    <div class="input-pencatatan">
                        <input type="number" class="form-control" id="pengeluaran_bahan_baku" name="pengeluaran_bahan_baku">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="pengeluaran_produksi">Pengeluaran Produksi</label></div>
                    <div class="input-pencatatan">

                        <input type="number" class="form-control" id="pengeluaran_produksi" name="pengeluaran_produksi">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="pengeluaran_kemasan">Pengeluaran Kemasan</label></div>
                    <div class="input-pencatatan">

                        <input type="number" class="form-control" id="pengeluaran_kemasan" name="pengeluaran_kemasan">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="pengeluaran_transportasi">Pengeluaran Transportasi</label></div>
                    <div class="input-pencatatan">

                        <input type="number" class="form-control" id="pengeluaran_transportasi" name="pengeluaran_transportasi">
                    </div>
                </div>
            </div>
            
            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="pengeluaran_gaji">Pengeluaran Gaji Pegawai</label></div>
                    <div class="input-pencatatan">

                        <input type="number" class="form-control" id="pengeluaran_gaji" name="pengeluaran_gaji">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="pengeluaran_lainnya">Pengeluaran Lain-lain</label></div>
                    <div class="input-pencatatan">

                        <input type="number" class="form-control" id="pengeluaran_lainnya" name="pengeluaran_lainnya">
                    </div>
                </div>
            </div>

            <div class="flex gap-4 sm:w-1/3 float-right mt-4">

                <a href="#" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Batal</a>
                <button class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection