@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Tambah Pengiriman</h1>
        @can('mitra')
        <form method="post" action="{{ route('tambahPengirimanMitra') }}">
            @csrf
            <table class="border w-full">
                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Kantor Tujuan</td>
                        <td>
                        <label for="id_kantor_admin"></label>
                            <select class="form-control w-50 mb-3" name="id_kantor_admin" id="id_kantor_admin">
                                <option disabled value>Pilih Kantor Tujuan</option>
                                @foreach($kantor as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Produk</td>
                        <td>
                        <label for="id_produk"></label>
                            <select class="form-control w-50 mb-3" name="id_produk" id="id_produk">
                                <option disabled value>Pilih Produk</option>
                                @foreach($pengajuan as $item)
                                <option value="{{ $item->id }}"> {{ $item->produk->nama }} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </div>
            </table>

            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center">Batal</button>
            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center" id="submit">Kirim</button>
        </form>
        @endcan
        
        @can('admin')
        <form method="post" action="{{ route('tambahPengirimanAdmin') }}">
            @csrf
            <table class="border w-full">
                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Alamat Toko</td>
                        <td>
                        <label for="id_kantor_admin"></label>
                            <select class="form-control w-50 mb-3" name="id_toko" id="id_toko">
                                <option disabled value>Pilih Toko Tujuan</option>
                                @foreach($toko as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Produk</td>
                        <td>
                        <label for="id_produk"></label>
                            <select class="form-control w-50 mb-3" name="id_produk" id="id_produk">
                                <option disabled value>Pilih Produk</option>
                                @foreach($pengirimanAdmin as $item)
                                <option value="{{ $item->id }}"> {{ $item->produk->nama }} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Jumlah</td>
                        <td>
                            <label for="jumlah"></label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control w-full  bg-transparent" required>
                        </td>
                    </tr>
                </div>
            </table>

            
            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center">Batal</button>
            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center" id="submit">Kirim</button>
        </form>
        @endcan

        {{-- <a href="{{ route('buat_pengajuan-1') }}" class=" selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center " id="logoutBtn">Selanjutnya</a> --}}
        <!-- <a href="" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Edit</a> -->
    </div>
</div>
</div>
</div>
@endsection