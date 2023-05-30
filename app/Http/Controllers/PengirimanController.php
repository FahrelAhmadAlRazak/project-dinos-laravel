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
    // public function lihatPengiriman() {
    //     $pengiriman = PengirimanAdmin::all();
    //     // dd($kurir);
    //     return view('lihatPengiriman', compact('pengiriman'));
    // }

    public function lihatPengiriman()
    {
        if (Gate::allows('admin')) {
            $pengiriman = PengirimanToko::all();
        } elseif(Gate::allows('mitra')) {
            $pengiriman = PengirimanAdmin::all();
            
        } else{
            
            $pengiriman = Pengajuan::whereRelation('User', 'id', auth()->user()->id)->get();
        }
        return view('lihatPengiriman', compact('pengiriman'));
    }
    

    // public function detailPengirimanAdmin(PengirimanToko $pengiriman) {
    //     // $pengiriman = PengirimanAdmin::all();
    //     // dd($pengiriman);
    //     // $pengiriman = PengirimanAdmin::all() && PengirimanToko::all();
    //     return view('detailPengiriman', compact('pengiriman'));
    // }

    public function detailPengiriman() {
        $pengirimanAdmin = PengirimanAdmin::select('id', 'created_at', 'id_kantor_admin', 'id_produk','id_status_pengiriman','id_kurir')->get();
    
        $pengirimanToko = PengirimanToko::select('id', 'created_at', 'jumlah','id_toko','id_produk','id_status_pengiriman','id_kurir')->get();
    
        $pengiriman = $pengirimanAdmin->concat($pengirimanToko);
    
        return view('detailPengiriman', compact('pengiriman'));
    }

    // public function detailPengirimanAdmin() {
    //     $pengirimanAdmin = PengirimanAdmin::select('id', 'nama', 'alamat')
    //         ->where('status', '!=', 'selesai')
    //         ->get();
    
    //     $pengirimanToko = PengirimanToko::select('id', 'nama', 'alamat')
    //         ->where('status', '!=', 'selesai')
    //         ->get();
    
    //     $pengiriman = $pengirimanAdmin->union($pengirimanToko);
    
    //     return view('detailPengiriman', compact('pengiriman'));
    // }

    // public function detailPengirimanMitra(PengirimanToko $pengiriman) {
    //     // $pengiriman = PengirimanAdmin::all();
    //     // dd($pengiriman);
    //     return view('detailPengiriman', compact('pengiriman'));
    // }

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
        $pengirimanAdmin = PengirimanAdmin::all();
        $produk = Produk::all();
        $toko = Toko::all();
        $kantor = KantorAdmin::all();
        return view('tambahPengiriman', compact('produk', 'kantor', 'toko','pengajuan','pengirimanAdmin'))->with('message', 'sukses menambah pengiriman baru');
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
        $data = PengirimanAdmin::find($id);
        // dd($data);
        $status = $data->id_status_pengiriman;
        // dd($status);

        if ($status == 1) {
            $data->delete();
            return redirect()->back()->with(['success' => 'Data Berhasil dihapus']);
        }

        return redirect()->back()->with(['error' => 'Tidak dapat menghapus data']);
    }

    
    // public function belum_dikirim(Pengajuan $pengajuan)
    // {
    //     $datapengajuan = Pengajuan::find($pengajuan->id);
    //     $datapengajuan["id_status_pengajuan"] = 2;
    //     $data = $datapengajuan->toArray();
    //     Pengajuan::where('id', $datapengajuan->id)->update($data);
    //     // dd($a);
    //     return redirect('/detail_pengajuan/' . $datapengajuan->id);
    // }

    public function sedang_dikirim(Pengajuan $pengajuan)
    {
        $datapengajuan = Pengajuan::find($pengajuan->id);
        $datapengajuan["id_status_pengajuan"] = 3;
        $data = $datapengajuan->toArray();
        Pengajuan::where('id', $datapengajuan->id)->update($data);

        return redirect('/detail_pengajuan/' . $datapengajuan->id);
    }

    public function sudah_dikirim(Pengajuan $pengajuan)
    {
        $datapengajuan = Pengajuan::find($pengajuan->id);
        $datapengajuan["id_status_pengajuan"] = 3;
        $data = $datapengajuan->toArray();
        Pengajuan::where('id', $datapengajuan->id)->update($data);

        return redirect('/detail_pengajuan/' . $datapengajuan->id);
    }
}