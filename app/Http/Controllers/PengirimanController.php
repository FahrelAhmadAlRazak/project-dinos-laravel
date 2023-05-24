<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KantorAdmin;
use App\Models\Pengajuan;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\PengirimanAdmin;

class PengirimanController extends Controller
{
    public function lihatPengiriman() {
        $pengiriman = PengirimanAdmin::all();
        // dd($kurir);
        return view('lihatPengiriman', compact('pengiriman'));
    }

    public function detailPengiriman(PengirimanAdmin $pengiriman) {
        // $pengiriman = PengirimanAdmin::all();
        // dd($pengiriman);
        return view('detailPengiriman', compact('pengiriman'));
    }

    public function formPengiriman() {
        $produk = Produk::all();
        $kantor = KantorAdmin::all();
        $kurir = User::where('id_role', '2')->get();
        $perusahaan = Perusahaan::all();
        $pengajuan = Pengajuan::all();
        // dd($kurir);
        return view('tambahPengiriman', compact('produk', 'kantor', 'kurir', 'perusahaan','pengajuan'));
    }

    public function tambahPengiriman(Request $request) {
        $request->except('_token');
        // dd($request);
        $validate = $request->validate([
            'id_kantor_admin' => 'required',
            'id_produk' => 'required',
        ]);
        
        // $validate['id_kantor_admin'] = intval($validate['id_kantor_admin']);
        // $validate['id_produk'] = intval( $validate['id_produk']);
        $validate['id_status_pengiriman'] = 1;
        $validate['id_kurir'] = 2;
        
        // dd($validate);
    
        $pengiriman = new PengirimanAdmin($validate);
        $pengiriman->save();

        $produk = Produk::all();
        $kantor = KantorAdmin::all();
        $kurir = User::where('id_role', '2')->get();
        $perusahaan = Perusahaan::all();
        $pengajuan = Pengajuan::all();
        // dd($kurir);
        return view('tambahPengiriman', compact('produk', 'kantor', 'kurir', 'perusahaan','pengajuan'))->with('message', 'sukses menambah pengiriman baru');
    }
}
