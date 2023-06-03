@extends('layoutsDashboard.masterDashboard')
@section('content')

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Tambah Pengiriman</h1>
        @can('mitra')
        <form id="buat-pengiriman" method="post" action="{{ route('tambahPengirimanMitra') }}">
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
            </table>

            <a href="{{ route('pengiriman') }}" class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center">kembali</a>
            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center" id="submit">Kirim</button>
        </form>
        @endcan
        
        @can('admin')
        <form id="buat-pengiriman" method="post" action="{{ route('tambahPengirimanAdmin') }}">
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
                                <option value="{{ $item->produk->id }}"> {{ $item->produk->nama }} </option>
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
                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" class="form-control w-full  bg-transparent">
                        </td>
                    </tr>
                </div>
            </table>

            
            <a href="{{ route('pengiriman') }}" class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center">kembali</a>
            <button class="selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center" id="submit">Kirim</button>
        </form>
        <!-- Tampilkan pesan kesalahan -->
        @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif

        <!-- Tampilkan pesan keberhasilan -->
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @endcan

        {{-- <a href="{{ route('buat_pengajuan-1') }}" class=" selanjutnya w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white flex justify-center items-center " id="logoutBtn">Selanjutnya</a> --}}
        <!-- <a href="" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Edit</a> -->
    </div>

    <!-- <div id="notificationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
            <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
            <h3 class="text-xl text-center">Pengiriman telah berhasil dibuat</h3>
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>
        const _notificationModal = new Modal($('#notificationModal')[0]);
        $("#buat-pengiriman").submit(function(e) {
            e.preventDefault()
            // update data di server
            //----------------------
            // jika gagal
            //----------------------
            // $("#error-msg").removeClass("hidden");
            //----------------------
            // jika sukses
            _notificationModal.show();

            const form = this;
            setTimeout(function() {
                form.submit();
            }, 1000)



        })
    </script> -->

</div>
</div>
</div>
@endsection