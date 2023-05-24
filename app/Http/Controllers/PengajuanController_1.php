<?php

namespace App\Http\Controllers;

use App\Models\dataDetailPengajuan;
use App\Models\dataPengajuan;
use App\Models\dataPerusahaan;
use App\Models\dataProduk;
use Illuminate\Http\Request;

class PengajuanController_1 extends Controller
{
    public function create_1(Request $request)
    {
        
        
        $gambar = $request->gambar_produk;
        
        $dataProduk = new dataProduk([
            
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'gambar_produk' => $gambar
            
        ]);
        // $gmbr = $gambar->getClientOriginalName();
        // $gambar->move(public_path().'/img',$gmbr);
        // // dd($dataProduk);
        
        

        $idPerusahaan = dataPerusahaan::where('nama_perusahaan',$request->nama_perusahaan)->value('id_perusahaan');
        dd($idPerusahaan);
       

        // dd($idPengajuan);
        $dataPengajuan = new dataPengajuan([
            
            'id'=>auth()->user()['id'],
            'id_perusahaan_foreign'=>$idPerusahaan,
            
        ]);
        
        
        $idPengajuan = dataPengajuan::where('id_perusahaan_foreign',$idPerusahaan)->where('id',auth()->user()['id'])->value('id_pengajuan');
        $idProduk = dataProduk::where('nama_produk',$request->nama_produk)->value('id_produk');
        // dd($idProduk);


        $jumlahProduk = new dataDetailPengajuan([
            'id_produk'=> $idProduk,
            'id_pengajuan'=> $idPengajuan,
            'jumlah_produk' => $request->jumlah_produk
            
        ]);

        $dataProduk->save();
        $dataPengajuan->save();
        $jumlahProduk->save();

    }
}
