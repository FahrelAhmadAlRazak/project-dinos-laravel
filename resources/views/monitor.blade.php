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
                    @can('admin')
                    <th>Mitra</th>
                    @endcan
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
                    @can('admin')
                    <td class="text-center">{{ $item->mitra }}</td>
                    @endcan
                    <td class="text-center">{{ $item->produk->nama }}</td>
                    <td class="text-center">{{ $item->stok_produk . ' pcs' }}</td>
                    <td class="text-center">{{ $item->total_penjualan . ' pcs' }}</td>
                    @can('admin')
                    <td class="w-0/5 bg-admin-secondary hover:opacity-90 py-1 rounded-lg text-white text-center" role="button" onclick="showModals({{ $item->id }}, {{ $item->stok_produk }})">Ubah Stok</td>
                    @endcan
                </tr>
                
                @endforeach
                {{-- <div id="update" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
                            <h2 class="text-2xl font-bold mb-2">Ubah Stok</h2>
                           
                            <div class="">
                                <form action="/updatestock/{{ $item->id }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-outline">
                                            <label class="form-label font-bold" for="typeNumber">Ubah Stok :</label>
                                            <input type="number" id="typeNumber" class="form-control" name="stok_produk" id="stok_produk" value="{{ $item->stok_produk }}" />
                                        </div>
                                        <div>{{ $item->produk->nama }}</div>
                                    </div>
                                    <div class="w-full">
                                        <button class="w-1/2 float-right bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white mt-4">Ubah Stok</button>
                                    </div>
                                </form>
                                <a href="/monitor">
                                    <p style="position: absolute; top: 4px; right: 16px; cursor: pointer;">X</p>
                                </a>
                            
                            </div>
                        </div>
                    </div> --}}



            </table>
        </div>
    </div>
</div>

<div id="modal" style="position: absolute; z-index: 20; top: 0; left: 0; width: 100%; height: 100%; display: none; background: rgba(0, 0, 0, 0.2); justify-content: center; align-items: center;">
    <div class="overflow-x-hidden overflow-y-auto md:inset-0 max-h-full w-1/3">
        <form id="formElement" method="post">
        @csrf
            <div class="bg-white relative px-8 py-6  max-w-2xl max-h-full flex flex-col items-center">
                <div class="form-outline">
                    <label class="form-label font-bold" for="typeNumber">Ubah Stok :</label>
                    <input type="number" class="form-control" name="stok_produk" id="stok_produk"/>
                </div>
                <div class="flex gap-4 w-2/3" style="margin-top: 10px;">
                    <button class="w-1/2 bg-green-700 text-white text-center py-2" name="submit" id="submit">Ubah</button>
                    <button class="w-1/2 bg-red-700 text-white py-2" onclick="hideModals()">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>






{{-- <!-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                </div> --> --}}





</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
    let modal = document.querySelector("#modal");
    let stok_input = document.getElementById("stok_produk");
    let formElement = document.getElementById("formElement");
     
    function showModals(id, stok) {
        console.log(stok);
        modal.style.display = "flex";
        stok_input.value = stok;
        // formElement.action = "/updatestock/" + id;
        formElement.action = "/updatestock/" + id.toString();

    }

    function hideModals() {
        modal.style.display = "none";
    }


</script>
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