<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KantorAdmin;
use App\Models\Pengajuan;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\TokoProduk;
use App\Models\Toko;
use App\Models\PengirimanAdmin;
use App\Models\PengirimanToko;
use Illuminate\Support\Facades\Gate;

class PengirimanController extends Controller
{
    public function lihatPengiriman() {
        $pengiriman = PengirimanAdmin::all();
        // dd($kurir);
        return view('lihatPengiriman', compact('pengiriman'));
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
    

    public function detailPengiriman(PengirimanAdmin $pengiriman) {
        // $pengiriman = PengirimanAdmin::all();
        // dd($pengiriman);
        return view('detailPengiriman', compact('pengiriman'));
    }

    public function formPengiriman()
    {   $pengirimanAdmin = PengirimanAdmin::all();
        // $pengajuan = Pengajuan::where('id_user',auth()->user()->id)->get();
        $pengajuan = Pengajuan::where('id_user', auth()->user()->id)
                      ->where('id_status_pengajuan', 2)
                      ->get();
        // dd($pengajuan);
        // $pengajuan = Pengajuan::all();
        $produk = Produk::all();
        $toko = Toko::all();
        $kantor = KantorAdmin::all();
        return view('tambahPengiriman', compact('produk', 'kantor', 'toko','pengajuan','pengirimanAdmin'));
    }

    public function tambahPengirimanMitra(Request $request) {
        $request->except('_token');
        // dd($request);
        $validate = $request->validate([
            'id_kantor_admin' => 'required',
            'id_produk' => 'required',
        ]);
        
        $validate['id_status_pengiriman'] = 1;
        $validate['id_kurir'] = 2;
        
        // dd($validate);
    
        $pengiriman = new PengirimanAdmin($validate);
        $pengiriman->save();

        $pengajuan = Pengajuan::where('id_user',auth()->user()->id)->get();
        $produk = Produk::all();
        $toko = Toko::all();
        $kantor = KantorAdmin::all();
        return view('tambahPengiriman', compact('produk', 'kantor', 'toko','pengajuan'))->with('message', 'sukses menambah pengiriman baru');
    }

    public function tambahPengirimanAdmin(Request $request) {
        // dd($request);
        $request->except('_token');
        // dd($request);
        $validate = $request->validate([
            'id_toko' => 'required', 
            'id_produk' => 'required',
            'jumlah' => 'required',
        ]);

        // dd($validate);
        
        $tokoproduk = new TokoProduk([
            'id_toko' => $validate['id_toko'], 
            'id_produk' => $validate['id_produk'],
            'stok_produk' => $validate['jumlah'],
        ]);
        $tokoproduk->save();

        $validate['id_status_pengiriman'] = 1;
        $validate['id_kurir'] = 2;
        
        // dd($validate);
    
        $pengiriman = new PengirimanToko($validate);
        $pengiriman->save();

        $produk = Produk::find($request->id_produk);
        $produk['jumlah'] =  $produk['jumlah'] - $request['jumlah'];
        $data = $produk->toArray();
        Produk::where('id', $produk->id)->update($data);
        

        $produk = Produk::all();
        $toko = Toko::all();
        $kantor = KantorAdmin::all();
        return view('tambahPengiriman', compact('produk', 'kantor', 'toko'))->with('message', 'sukses menambah pengiriman baru');
    }

    public function batal_pengiriman($id){
        $data = PengirimanToko::find($id);
        dd($data);
        $status = $data->id_status_pengiriman;
        dd($status);

        if ($status == 1) {
            $data->delete();
            return redirect()->back()->with(['success' => 'Data Berhasil dihapus']);
        }

        return redirect()->back()->with(['error' => 'Tidak dapat menghapus data']);
    }

    
    public function belum_dikirim(Pengajuan $pengajuan)
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
}