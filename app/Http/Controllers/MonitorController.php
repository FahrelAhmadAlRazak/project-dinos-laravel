<?php

namespace App\Http\Controllers;

use App\Models\PengirimanToko;
use Illuminate\Http\Request;

use App\Models\TokoProduk;

class MonitorController extends Controller
{
    public function monitor() {
        $monitor = TokoProduk::all();
        // dd($kurir);
        return view('monitor', compact('monitor'));
    }

    public function detailMonitor(TokoProduk $monitor) {
        // dd($kurir);
        return view('detailMonitor', compact('monitor'));
    }
    
    public function updateStock(Request $request, TokoProduk $monitor)
{
    $pengirimanToko = PengirimanToko::where('id', $monitor->id)->value('jumlah');
    
    $monitor->stok_produk = $request->stok_produk;
    $monitor->total_penjualan = $pengirimanToko - $monitor->stok_produk;
    
    $monitor->save();

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
