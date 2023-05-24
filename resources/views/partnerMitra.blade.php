@extends('layoutsPartner.masterPartnerMitra')
@section('content')

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Data Akun Mitra</h1>
        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>

                </tr>

                @foreach ($users as $item)

                <tr>
                    <td><a href="/detailPartnerMitra/{{ $item->id }}">{{ $item->nama }}</a></td>
                    <td><a href="#">{{ $item->username }}</a></td>
                    <td><a href="#">{{ $item->email }}</a></td>
                    <td><a href="#">{{ $item->jalan }}, {{ $item->kota->nama }}, {{ $item->provinsi->nama }}</a></td>
                    <td><a href="#">{{ $item->no_telepon }}</a></td>
                    <td><a href="#">{{ $item->tanggal_lahir }}</a></td>

                </tr>
                @endforeach












            </table>
        </div>

    </div>
</div>
</div>
</div>


@endsection