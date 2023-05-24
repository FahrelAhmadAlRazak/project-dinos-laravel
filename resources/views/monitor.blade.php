@extends('layoutsDashboard.masterDashboard')
@section('content')

<div id="content" class="pt-24 px-2 py-4 flex-grow h-screen">
    <div class="my-2 px-8 pt-6 pb-4 shadow w-full h-full overflow-y-scroll">
        <h1 class="text-3xl font-medium mb-4">Data Kerja Sama Mitra</h1>
        <div>
            <table class="data-pengajuan border w-full overflow-x-scroll">
                <tr>
                    <th>Id Pengajuan</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat Tempat Usaha</th>
                    <th>Email Pemilik</th>
                </tr>

                <tr>
                    <td class="text-center"><a href="/detailMonitor">1</a></td>
                </tr>



            </table>
        </div>

    </div>
</div>
</div>
</div>
@endsection