@extends('layoutsDashboard.masterDashboard')
<!-- @section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection -->
@section('content')

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> -->

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Data Kerja Sama Mitra</h1>
        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    <th>Toko</th>
                    <th>Produk</th>
                    <th>Stok Produk</th>
                    <th>Produk Terjual</th>
                    @can('admin')
                    <th>Aksi</th>
                    @endcan
                </tr>

                @foreach ($monitor as $item)
                <tr class="bg-slate-200">
                    <td class="text-center">{{ $item->toko->nama }}</td>
                    <td class="text-center">{{ $item->produk->nama }}</td>
                    <td class="text-center">{{ $item->stok_produk . ' pcs' }}</td>
                    <td class="text-center">{{ $item->total_penjualan . ' pcs' }}</td>
                    @can('admin')
                    <td class="w-0/5 bg-admin-secondary hover:opacity-90 py-1 rounded-lg text-white text-center" data-bs-toggle="modal" data-modal-target="update" data-modal-toggle="update" href="#exampleModalToggle" role="button">Ubah Stok</td>
                    @endcan
                </tr>
                
                @endforeach
                <div id="update" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                        <h2 class="text-2xl font-bold mb-2">Ubah Stok</h2>
                        <!-- <h3 class="text-xl mb-6">"Anda yakin ingin keluar?"</h3> -->
                        <div class="">
                            <form action="/updatestock/{{ $item->id }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-outline">
                                        <label class="form-label font-bold" for="typeNumber">Ubah Stok :</label>
                                        <input type="number" id="typeNumber" class="form-control" name="stok_produk" id="stok_produk" value="{{ $item->stok_produk }}" />
                                    </div>
                                </div>
                                <div class="w-full">

                                    <button class="w-1/2 float-right bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white mt-4">Ubah Stok</button>
                                </div>

                            </form>
                            <a href="/monitor">
                                <p style="position: absolute; top: 4px; right: 16px; cursor: pointer;">X</p>
                            </a>
                            <!-- <a class="w-1/2 bg-green-700 text-white text-center py-2" id="iyaLogout" href="{{route('logout')}}">Iya</a> -->
                            <!-- <button class="w-1/2 bg-red-700 text-white py-2" id="noLogout" data-modal-target="logoutModal" data-modal-toggle="logoutModal">Tidak</button> -->
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">Update Stok</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/updatestock/{{ $item->id }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeNumber">Update Stok</label>
                                        <input type="number" id="typeNumber" class="form-control" name="stok_produk" id="stok_produk" value="{{ $item->stok_produk }}" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" id="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div> -->



{{-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a> --}}

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
    const _passwordModal = new Modal($('#passwordModal')[0], {
        closable: false,
    });
    _passwordModal.show();


    // $("#passwordModalConf").click(() => {
    // if ($("#passwordModalValue").val() == "test") {
    //     _passwordModal.hide();
    // } else {
    //     $("#passwordModalErr").removeClass("hidden");
    // }
    // });

    const _notificationModal = new Modal($('#notificationModal')[0]);
    $("#editAkun").submit(function(e) {
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
@endsection


<!-- @section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
@endsection -->