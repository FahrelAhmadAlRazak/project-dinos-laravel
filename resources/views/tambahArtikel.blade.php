@extends('layoutsDashboard.masterDashboard')
@section('content')
<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Tambah Artikel</h1>
        <form action="{{ route('tambahArtikel') }}" method="post" enctype="multipart/form-data" id="artikel">
            @csrf
            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="nama">Judul Artikel</label></div>
                    <div class="input-art">

                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="nama">Isi</label></div>
                    <div class="input-art">

                        <textarea type="text" class="form-control" id="isi" name="isi"></textarea>
                    </div>
                 

                </div>
            </div>
            <div class="form-group mb-4">
                <div class="">
                    <div class="font-medium mb-2"><label for="nama">Gambar</label></div>
                    <div class="input-art">

                        <input type="file" class="form-control" id="gambar" name="gambar" multiple>
                    </div>
                </div>
            </div>
            <div class="flex gap-4 sm:w-1/3 float-right mt-4">
               
                <button class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white">Simpan</button>
                <a href="{{ route('artikel') }}" class="w-1/2 bg-admin-secondary hover:opacity-90 py-1 rounded-full text-white text-center">Kembali</a>
            </div>
        </form>
    </div>
</div>

<div id="notificationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="bg-white relative px-8 py-6 w-1/3 max-w-2xl max-h-full flex flex-col items-center">
        <h2 class="text-2xl font-bold mb-2">Notifikasi!</h2>
        <h3 class="text-xl">"Artikel telah disimpan"</h3>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
      const _notificationModal = new Modal($('#notificationModal')[0]);
    $("#artikel").submit(function(e)  {
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
        setTimeout(function(){
            form.submit();
        },1000)
    })
</script>

@endsection