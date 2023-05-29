@extends('layoutsDashboard.masterDashboard')
@section('content')

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Detail Produk</h1>
        <form>
            @csrf
            {{-- @method('put') --}}
            <table class="border w-full">
                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Nama Produk yang Diajukan</td>
                        <td>
                            {{  }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Jumlah Produk yang Diajukan</td>
                        <td>

                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Harga Produk yang Diajukan</td>
                        <td>

                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Deskripsi Produk yang Diajukan</td>
                        <td>

                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Gambar Produk</td>
                        {{-- <td></td> --}}
                        <td>

                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Status</td>
                        <td>

                        </td>
                    </tr>
                </div> 


            </table>
            @if(Str::length(Auth::guard('dataAkunAdmin')->user()) > 0)
            <div class="flex gap-4 sm:w-1/3">
                <a class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center" href="#">Ubah Stok</a>
                <a class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center" href="#">Tambah Stok</a>
                <!-- {{-- <a href="{{ route('show_dt_detail_pengajuan') }}" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Kembali</a> --}} -->
                <!-- <a href="{{ route('update') }}" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Simpan</a> -->
            </div>
            @endif
        </form>
        <div class="mt-8 flex flex-col xs:items-center sm:flex-row sm:justify-between sm:items-start">
            <div class="relative w-1/2">
                <p id="error-msg" class="hidden absolute top-0 bg-red-700 text-white px-8 py-2 rounded-lg">“Semua data harus terisi dengan benar”</p>
            </div>
        </div>

        <div id="notificationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
                <h3 class="text-xl">"Jumlah stok produk telah berhasil diperbarui!"</h3>
            </div>

            <div id="passwordModal" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 w-full p-4  overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <form class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center" action="#" method="#">
                    @csrf
                    <table class="border w-full">

                        <h2 class="text-2xl font-bold mb-2">Tambah Stok Produk</h2>
                        <div class="form-group">
                            <tr>
                                <td class="w-1/3 px-4 py-3 mb-3">Jumlah Stok Produk</td>
                                <td>
                                    <input type="number" name="nama_produk" id="nama_produk" class="w-full bg-transparent form-control" required>
                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td class="w-1/3 px-4 py-3 mb-3">Jumlah Produk Terjual</td>
                                <td>
                                    <input type="number" name="nama_produk" id="nama_produk" class="w-full bg-transparent form-control" required>
                                </td>
                            </tr>
                        </div>
                    </table>
                    <button id="passwordModalConf" class="mt-2 bg-blue-500 text-white px-4 py-1 rounded">Simpan</button>
                    <a id="passwordModalConf" class="mt-2 bg-blue-500 text-white px-4 py-1 rounded" href="#">Batal</a>
                    <p id="passwordModalErr" class="hidden mt-3 bg-red-700 text-white px-8 py-2 rounded-lg">“Data harus diisikan secara lengkap!”</p>
                </form>
            </div>
        </div>
    </div>



    @endsection