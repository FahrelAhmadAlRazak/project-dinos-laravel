@extends('layoutsPengiriman.masterTambahPengiriman')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Tambah Pengiriman</h1>
        <form method="post" action="{{ route('tambahPengiriman') }}">
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
                                <option value="{{ $item->produk->id }}"> {{ $item->produk->nama }} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </div>

                {{-- <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Kurir</td>
                        <td>
                        <label for="id_kurir"></label>
                            <select class="form-control w-50 mb-3" name="id_kurir" id="id_kurir">
                                <option disabled value>Pilih Kurir</option>
                                @foreach($kurir as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </div> --}}
               
            </table>

            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center">Batal</button>
            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center" id="submit">Kirim</button>
        </form>

        {{-- <a href="{{ route('buat_pengajuan-1') }}" class=" selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center " id="logoutBtn">Selanjutnya</a> --}}
        <!-- <a href="" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Edit</a> -->
    </div>
</div>
</div>
</div>
@endsection