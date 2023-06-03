<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\PengirimanToko;
use Illuminate\Http\Request;

use App\Models\TokoProduk;
use Illuminate\Support\Facades\Gate;

class MonitorController extends Controller
{
    public function monitor() {
        // $monitor = TokoProduk::all();
        // // dd($kurir);
        // return view('monitor', compact('monitor'));

        if (Gate::allows('admin')) {
            $monitor = TokoProduk::all();
        } else {
            $monitor = TokoProduk::whereIn('id_produk', function ($query) {
                $query->select('id_produk')
                    ->from('pengajuans')
                    ->where('id_user', auth()->user()->id);
            })->get();
        }
        return view('monitor', compact('monitor'));
    }

    public function detailMonitor(TokoProduk $monitor) {
        // dd($kurir);
        return view('detailMonitor', compact('monitor'));
    }
    
    public function updateStock1(Request $request, TokoProduk $monitor)

{
    // dd($request);
    $pengirimanToko = PengirimanToko::where('id_produk', $monitor->id_produk)->value('jumlah');
    // dd($pengirimanToko);
    $monitor->stok_produk = $request->stok_produk;
    $monitor->total_penjualan = $pengirimanToko - $request->stok_produk; // Menggunakan $request->stok_produk sebagai pengurangan
    dd($monitor);
    
    $monitor->save();

    return redirect('/monitor');
}

public function updateStock(Request $request, TokoProduk $monitor) {
    // dd($monitor);

    $monitor->total_penjualan = $monitor->total_penjualan + ($monitor->stok_produk - $request->stok_produk);

    $monitor->stok_produk = intval($request->stok_produk);

    $data = $monitor->toArray();
    // dd($data);
    TokoProduk::where('id', $monitor->id)->update($data);

    return redirect('/monitor');
}

    public function tambahStock(Request $request, TokoProduk $monitor) {
        // dd($kurir);
        $monitor["stok_produk"] += $request->stok_baru;
        $data = $monitor->toArray();
        TokoProduk::where('id', $monitor->id)->update($data);

        return redirect('/monitor/' . $monitor);
    }
}
