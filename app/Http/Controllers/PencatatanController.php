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
    public function tambahPencatatan(Request $request)
    {


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

        $all = TokoProduk::all();
        $tokoProduk = TokoProduk::pluck('total_penjualan');
        // dd($tokoProduk);
        // $produk = Produk::all();
        $produk = Produk::join('total_penjualan', 'produk.id', '=', 'total_penjualan.id_produk')
                ->select('nama.harga')
                ->get();
        dd($produk);

        Pencatatan::create([
            'pengeluaran_bahan_baku' => $request->pengeluaran_bahan_baku,
            'pengeluaran_produksi' => $request->pengeluaran_produksi,
            'pengeluaran_kemasan' => $request->pengeluaran_kemasan,
            'pengeluaran_transportasi' => $request->pengeluaran_transportasi,
            'pengeluaran_gaji' => $request->pengeluaran_gaji,
            'pengeluaran_lainnya' => $request->pengeluaran_lainnya,
            'total_pengeluaran' => strval($total_pengeluaran),
            'id_user' => auth()->user()->id,
        ]);

        


        return redirect('lihatPencatatan');
    }
}
