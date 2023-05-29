<?php

namespace App\Http\Controllers;

use App\Models\dataDetailPengajuan;
use App\Models\dataKota;
use App\Models\dataPengajuan;
use App\Models\Perusahaan;
use App\Models\Produk;
use App\Models\Provinsi;
use App\Models\dataStatusPengajuan;
use App\Models\Pengajuan;
use App\Models\StatusPengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PengajuanController extends Controller
{

    public function pengajuan()
    {
        return view('pengajuan');
    }

    public function show_pengajuan()
    {
        if (Gate::allows('admin')) {
            $pengajuan = Pengajuan::all();
        } else {
            $pengajuan = Pengajuan::whereRelation('User', 'id', auth()->user()->id)->get();
        }
        return view('dataPengajuan', compact('pengajuan'));
    }

    public function showDataDetailPengajuanMitra()
    {
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        $dataDetailPengajuan = dataDetailPengajuan::paginate(10);
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('dataPengajuanMitra', compact('dataDetailPengajuan'));
    }

    public function showDetailDataPengajuan($id)
    {
        // @dd($dataDetailPengajuan);
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        // $dataDetailPengajuan = dataDetailPengajuan::findOrFail($id);

        // $idDetailPengajuan = dataDetailPengajuan::find($id);
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        $pengajuan = Pengajuan::find($id);

        return view('detailPengajuan', compact('pengajuan'));
    }




    public function showKota()
    {
        $provinsi = Provinsi::all();
        return view('buatPengajuan', compact('provinsi'));
    }



    public function create(Request $request)
    {
        // @dd($request);
        $request->validate([
            'nama_perusahaan' => 'required',
            'jalan' => 'required',
            'id_kota' => 'required',
            'id_provinsi' => 'required',
            'nomer_izin_usaha' => 'required',
            'notelp_perusahaan' => 'required',
            'email_perusahaan' => 'required',
            'nama_produk' => 'required',
            'jumlah_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'gambar_produk' => 'required'

        ]);

        $perusahaan = Perusahaan::create([
            // 'id_perusahaan'=> $idPerusahaan,
            'nama' => $request->nama_perusahaan,
            'no_izin' => $request->nomer_izin_usaha,
            'no_telepon' => $request->notelp_perusahaan,
            'email' => $request->email_perusahaan,
            'jalan' => $request->jalan,
            'id_kota' => $request->id_kota,
            'id_provinsi' => $request->id_provinsi,

        ]);

        $gambar = $request->gambar_produk;
        // $gambar2 = $request->gambar_produk_2;
        // $gambar3 = $request->gambar_produk_3;
        $gmbr = $gambar->getClientOriginalName();
        // $gmbr2 = $gambar2->getClientOriginalName();
        // $gmbr3 = $gambar3->getClientOriginalName();

        $produk = Produk::create([
            'nama' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'jumlah' => $request->jumlah_produk,
            'deskripsi' => $request->deskripsi_produk,
            'gambar' => $gmbr,

            // 'nama' => $request->nama_produk_2,
            // 'harga' => $request->harga_produk_2,
            // 'jumlah' => $request->jumlah_produk_2,
            // 'deskripsi' => $request->deskripsi_produk_2,
            // 'gambar' => $gmbr2,

            // 'nama' => $request->nama_produk,
            // 'harga' => $request->harga_produk,
            // 'jumlah' => $request->jumlah_produk,
            // 'deskripsi' => $request->deskripsi_produk,
            // 'gambar' => $gmbr3,

            $gambar->move(public_path() . '/img', $gmbr),
            // $gambar2->move(public_path() . '/img', $gmbr),
            // $gambar3->move(public_path() . '/img', $gmbr),


        ]);
        // $produkData = []; // Array untuk menyimpan data produk

        // // Loop untuk mengambil data dari input form
        // for ($i = 1; $i <= 3; $i++) {
        //     $gambar = $request->file('gambar_produk_' . $i);
        //     $gmbr = $gambar->getClientOriginalName();

        //     // Tambahkan data produk ke array
        //     $produkData[] = [
        //         'nama' => $request->input('nama_produk_' . $i),
        //         'harga' => $request->input('harga_produk_' . $i),
        //         'jumlah' => $request->input('jumlah_produk_' . $i),
        //         'deskripsi' => $request->input('deskripsi_produk_' . $i),
        //         'gambar' => $gmbr,
        //     ];

        //     // Pindahkan gambar ke direktori tujuan
        //     $gambar->move(public_path() . '/img', $gmbr);
        // }
        // dd($produkData);

        // // Simpan data produk ke tabel produk
        // Produk::insert($produkData);


        Pengajuan::create([
            'id_perusahaan' => $perusahaan->id,
            'id_produk' => $produk->id,
            'id_status_pengajuan' => 1,
            'id_user' => auth()->user()->id,
        ]);

        return redirect('showpengajuan')->withErrors(['error' => 'Semua data harus terisi dengan benar'])->with('success', 'Data berhasil ditambahkan');

    }

    public function batal_pengajuan($id)
    {
        $data = Pengajuan::find($id);
        $status = $data->id_status_pengajuan;

        if ($status == 1) {
            $data->delete();
            return redirect()->back()->with(['success' => 'Data Berhasil dihapus']);
        }

        // return redirect('showpengajuan');
        return redirect()->back()->with(['error' => 'Tidak dapat menghapus data']);
    }
    public function setujuiPengajuan(Pengajuan $pengajuan)
    {
        $datapengajuan = Pengajuan::find($pengajuan->id);
        $datapengajuan["id_status_pengajuan"] = 2;
        $data = $datapengajuan->toArray();
        Pengajuan::where('id', $datapengajuan->id)->update($data);
        // dd($a);
        return redirect('/detail_pengajuan/' . $datapengajuan->id);
    }

    public function tolakPengajuan(Pengajuan $pengajuan)
    {
        $datapengajuan = Pengajuan::find($pengajuan->id);
        $datapengajuan["id_status_pengajuan"] = 3;
        $data = $datapengajuan->toArray();
        Pengajuan::where('id', $datapengajuan->id)->update($data);

        return redirect('/detail_pengajuan/' . $datapengajuan->id);
    }
};
