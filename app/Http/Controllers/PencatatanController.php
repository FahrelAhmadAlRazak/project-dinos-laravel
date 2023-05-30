<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
use App\Models\Produk;
use App\Models\TokoProduk;
use Illuminate\Http\Request;

class PencatatanController extends Controller
{

    public function show_tambah_pencatatan()
    {
        

        return view('tambahPencatatan');
    }
    public function lihatPencatatan()
    {
        $pencatatan = Pencatatan::all();
        // $id = Pencatatan::find($id);

        return view('lihatPencatatan',compact('pencatatan'));
    }
    public function detailPencatatan($id)
    {
        $pencatatan = Pencatatan::find($id);
        // dd($pencatatan);
        // $id = Pencatatan::find($id);

        return view('detailPencatatan',compact('pencatatan'));
    }


    public function tambahPencatatan(Request $request)
    {
        $pemasukan = 0;
        foreach (auth()->user()->pengajuan as $key => $value) {
            if(count($value->produk->tokoproduk) > 0) {
                // dd($value);
                $pemasukan += $value->produk->tokoproduk[count($value->produk->tokoproduk)-1]->total_penjualan * $value->produk->harga;
            } else {
                continue;
            }
        };

        $request->validate([
            'pengeluaran_bahan_baku' => 'required',
            'pengeluaran_produksi' => 'required',
            'pengeluaran_kemasan' => 'required',
            'pengeluaran_transportasi' => 'required',
            'pengeluaran_gaji' => 'required',
            'pengeluaran_lainnya' => 'required',
        ]);
        // dd($request);
        $pengeluaran_bahan_baku = $request->pengeluaran_bahan_baku;
        $pengeluaran_produksi = $request->pengeluaran_produksi;
        $pengeluaran_kemasan = $request->pengeluaran_kemasan;
        $pengeluaran_transportasi = $request->pengeluaran_transportasi;
        $pengeluaran_gaji = $request->pengeluaran_gaji;
        $pengeluaran_lainnya = $request->pengeluaran_lainnya;
        $total_pengeluaran = $pengeluaran_bahan_baku + $pengeluaran_produksi + $pengeluaran_kemasan + $pengeluaran_transportasi + $pengeluaran_gaji + $pengeluaran_lainnya;

        Pencatatan::create([
            'pengeluaran_bahan_baku' => $request->pengeluaran_bahan_baku,
            'pengeluaran_produksi' => $request->pengeluaran_produksi,
            'pengeluaran_kemasan' => $request->pengeluaran_kemasan,
            'pengeluaran_transportasi' => $request->pengeluaran_transportasi,
            'pengeluaran_gaji' => $request->pengeluaran_gaji,
            'pengeluaran_lainnya' => $request->pengeluaran_lainnya,
            'total_pengeluaran' => strval($total_pengeluaran),
            'pemasukan' => strval($pemasukan),
            'profit' => strval($pemasukan - $total_pengeluaran),
            'id_user' => auth()->user()->id,
        ]);

        return redirect('lihatPencatatan');
    }
}