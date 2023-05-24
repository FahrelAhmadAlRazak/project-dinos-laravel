{{-- @dd($dataDetailPengajuan->dataPengajuan->dataAkunMitra->dataKota->nama) --}}
@extends('layoutsPengajuan.masterDetailPengajuan')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Detail Pengajuan</h1>
        <form id="konfirmasi">
            @csrf
            {{-- @method('put') --}}
            <table class="border w-full">

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Tanggal</td>
                        <td>
                            {{ $pengajuan->created_at }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Nama Pemilik</td>
                        <td>
                            {{ $pengajuan->user->nama }}
                        </td>
                    </tr>
                </div>



                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Alamat Pemilik</td>
                        <td>
                            {{ $pengajuan->user->jalan }}, {{ $pengajuan->user->kota->nama }}, {{ $pengajuan->user->provinsi->nama }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Nama Usaha/Produk</td>
                        <td>{{ $pengajuan->perusahaan->nama }}</td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Alamat Tempat Usaha</td>
                        <td>
                            {{ $pengajuan->perusahaan->jalan }}, {{ $pengajuan->perusahaan->kota->nama }}, {{ $pengajuan->perusahaan->provinsi->nama }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Nomor Izin Usaha</td>
                        <td>
                            {{ $pengajuan->perusahaan->no_izin}}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">No Telepon Perusahaan</td>
                        <td>
                            {{ $pengajuan->perusahaan->no_telepon }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Email Perusahaan</td>
                        <td>
                            {{ $pengajuan->Perusahaan->email }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Nama Produk yang Diajukan</td>
                        <td>
                            {{ $pengajuan->produk->nama }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Jumlah Produk yang Diajukan</td>
                        <td>
                            {{ $pengajuan->produk->jumlah }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Harga Produk yang Diajukan</td>
                        <td>
                            {{ $pengajuan->produk->harga }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Deskripsi Produk yang Diajukan</td>
                        <td>
                            {{ $pengajuan->produk->deskripsi }}
                        </td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr>
                        <td class="w-1/3 px-4 py-3">Gambar Produk</td>
                        {{-- <td>{{  $item->dataProduk->gambar_produk }}</td> --}}
                        <td><img src="{{ asset('img/'.$pengajuan->produk->gambar) }}" alt="image"></td>
                    </tr>
                </div>

                <div class="form-group">
                    <tr class="bg-slate-200">
                        <td class="w-1/3 px-4 py-3">Status</td>
                        <td>
                            {{ $pengajuan->statusPengajuan->status }}
                        </td>
                    </tr>
                </div>


            </table>
            {{-- @if(Str::length(Auth::guard('dataAkunAdmin')->user()) > 0) --}}
            @can('admin')
            <div class="flex gap-4 sm:w-1/3 mt-4" >
                <a id="setuju" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center" href="/setujuiPengajuan/{{ $pengajuan->id }}">Setujui Pengajuan</a>
                <a id="tolak" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center" href="/tolakPengajuan/{{ $pengajuan->id }}">Tolak Pengajuan</a>
                <!-- {{-- <a href="{{ route('show_dt_detail_pengajuan') }}" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Kembali</a> --}} -->
                {{-- <a href="{{ route('update') }}" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Simpan</a> --}}
            </div>
            @endcan
        </form>




        <div class="mt-8 flex flex-col xs:items-center sm:flex-row sm:justify-between sm:items-start">
            <div class="relative w-1/2">
                <p id="error-msg" class="hidden absolute top-0 bg-red-700 text-white px-8 py-2 rounded-lg">“Semua data harus terisi dengan benar”</p>
            </div>
        </div>

        <div id="notificationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
                <h3 class="text-xl text-center">"Data pengajuan telah berhasil dikonfirmasi"</h3>
            </div>
        </div>
        <div id="notificationModal1" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
                <h3 class="text-xl text-center">"Data pengajuan telah ditolak"</h3>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <script>
            const _notificationModal = new Modal($('#notificationModal')[0]);
            $("#konfirmasi").submit(function(e) {
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
        </script>

        <script>
            const _notificationModal1 = new Modal($('#notificationModal')[0]);
            document.addEventListener('DOMContentLoaded', function() {
                var btn = document.getElementById('setuju');

                setTimeout(function() {

                    btn.onclick = function() {
                        _notificationModal1.show();
                    };
                }, 1000)


            });
        </script>
        <script>
            const _notificationModal2 = new Modal($('#notificationModal1')[0]);
            document.addEventListener('DOMContentLoaded', function() {
                var btn = document.getElementById('tolak');

                setTimeout(function() {

                    btn.onclick = function() {
                        _notificationModal2.show();
                    };
                }, 1000)


            });
        </script>
    </div>
</div>

@endsection