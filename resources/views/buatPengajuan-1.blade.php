@extends('layoutsPengajuan.masterBuatPengajuan-1')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Buat Pengajuan</h1>
        <form action="{{ route('create_pengajuan_1') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="border w-full">
            <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3 mb-3">Nama Produk yang Diajukan</td>
                        <td>
                            <input type="text" name="nama_produk" id="nama_produk" class="w-full bg-transparent form-control">
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3 mb-3">Jumlah Produk yang Diajukan</td>
                        <td>
                            <input type="number" name="jumlah_produk" id="jumlah_produk" class="w-full bg-transparent form-control">
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Harga Produk yang Diajuakan</td>
                        <td class="form-group">
                            <input type="text" name="harga_produk" id="harga_produk" class="w-full  bg-transparent form-control">
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Deskripsi Produk yang Diajuakan</td>
                        <td class="form-group">
                            <input type="text" name="deskripsi_produk" id="deskripsi_produk" class="w-full  bg-transparent form-control">
                        </td>
                    </tr>
                </div class="form-group">
                <div>
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Gambar Produk</td>
                        <td class="form-group">
                            <input type="file" name="gambar_produk" id="gambar_produk" class="w-full  bg-transparent form-control">
                        </td>
                    </tr>
                </div>
            </table>
            <div class="termsx">
                <p>
                    SYARAT DAN KETENTUAN
                    <br>
                    1. Kontrak berlaku selama 1 bulan dan selama kontrak kerja sama berjalan mitra hanya dapat mengirimkan produk yang sudah diajukan sebelumnya ke pihak distributor 
                    <br>
                    2. Mitra dikenakan biaya admin sebesar 5% dari harga produk/pcs 
                    <br>
                    3. Proses pengiriman akan menggunakan jasa pengiriman Dinos  dan biaya pengiriman ditanggung oleh mitra 
                    <br>
                    4. Mitra tidak dikenakan biaya lain selain yang sudah disebutkan 
                    <br>
                    5. Barang yang diberikan ke pihak distributor akan disalurkan pada toko-toko yang sudah menjalin kerjasama dengan pihak distributor 

                </p>

            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Setuju</label>
            </div>
            
                    <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center">Kirim</button>
                    <a href="{{ route('buat_pengajuan') }}" class="selanjutany w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center" id="">kembali</a>
            



        </form>



        <!-- <a  href="" class=" selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center " id="" >kirim</a> -->

    </div>
</div>
</div>
</div>



@endsection