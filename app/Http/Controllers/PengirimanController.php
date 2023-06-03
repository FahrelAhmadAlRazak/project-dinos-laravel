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
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

use function Symfony\Component\String\b;

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
        } elseif (Gate::allows('mitra')) {
            $user_id = auth()->user()->id;

            $pengiriman = PengirimanAdmin::join('pengajuans', 'pengiriman_admins.id_produk', '=', 'pengajuans.id_produk')
                ->where('pengajuans.id_user', $user_id)
                ->where('pengajuans.id_status_pengajuan', 2)
                ->select('pengiriman_admins.id', 'pengiriman_admins.created_at', 'pengiriman_admins.id_kantor_admin', 'pengiriman_admins.id_produk', 'pengiriman_admins.id_status_pengiriman', 'pengiriman_admins.id_kurir')
                ->get();
            
        } else {
            $pengirimanAdmin = PengirimanAdmin::select('id', 'created_at', 'id_kantor_admin', 'id_produk', 'id_status_pengiriman', 'id_kurir')->get();

            $pengirimanToko = PengirimanToko::select('id', 'created_at', 'jumlah', 'id_toko', 'id_produk', 'id_status_pengiriman', 'id_kurir')->get();

            $pengiriman = $pengirimanAdmin->concat($pengirimanToko);
        }
        // foreach ($pengiriman as $item) {
        //     $item->formatted_created_at = Carbon::parse($item->created_at)->format('d M Y H:i:s');
        // }
        return view('lihatPengiriman', compact('pengiriman'));
    }


    // public function detailPengirimanAdmin(PengirimanToko $pengiriman) {
    //     // $pengiriman = PengirimanAdmin::all();
    //     // dd($pengiriman);
    //     // $pengiriman = PengirimanAdmin::all() && PengirimanToko::all();
    //     return view('detailPengiriman', compact('pengiriman'));
    // }

    public function detailPengiriman($id)
    {
        if (Gate::allows('admin')) {
            $pengiriman = PengirimanToko::find($id);
        } elseif (Gate::allows('mitra')) {
            $pengiriman = PengirimanAdmin::find($id);
        } else {
            $pengirimanAdmin = PengirimanAdmin::find($id);
            $pengirimanToko = PengirimanToko::find($id);

            $pengiriman = $pengirimanAdmin ?? $pengirimanToko;
        }

        return view('detailPengiriman', compact('pengiriman'));
    }



    // public function detailPengirimanAdmin()
    // {
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
    {
        $pengirimanAdmin = PengirimanAdmin::where('id_status_pengiriman', 3)->get();
        // $pengajuan = Pengajuan::where('id_user',auth()->user()->id)->get();
        $pengajuan = Pengajuan::where('id_user', auth()->user()->id)
            ->where('id_status_pengajuan', 2)
            ->get();
        // dd($pengajuan);
        // $pengajuan = Pengajuan::all();
        $produk = Produk::all();
        $toko = Toko::all();
        $kantor = KantorAdmin::all();
        return view('tambahPengiriman', compact('produk', 'kantor', 'toko', 'pengajuan', 'pengirimanAdmin'));
    }

    public function tambahPengirimanMitra(Request $request)
    {

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

        $pengajuan = Pengajuan::where('id_user', auth()->user()->id)->get();
        $pengirimanAdmin = PengirimanAdmin::all();
        $produk = Produk::all();
        $toko = Toko::all();
        $kantor = KantorAdmin::all();
        return view('tambahPengiriman', compact('produk', 'kantor', 'toko', 'pengajuan', 'pengirimanAdmin','pengiriman'))->with('message', 'sukses menambah pengiriman baru');
    }

    public function tambahPengirimanAdmin(Request $request)
    {
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


        $pengirimanToko = PengirimanToko::all();
        $pengirimanAdmin = PengirimanAdmin::where('id_status_pengiriman', 3)->get();
        $produk = Produk::all();
        $toko = Toko::all();
        $kantor = KantorAdmin::all();
        // return view('tambahPengiriman', compact('produk', 'kantor', 'toko','pengirimanAdmin'))->with('message', 'sukses menambah pengiriman baru');
        return view('tambahPengiriman', [
            'produk' => $produk,
            'kantor' => $kantor,
            'toko' => $toko,
            'pengirimanAdmin' => $pengirimanAdmin,
            'error' => 'Semua data harus terisi dengan benar'
        ])->with('message', 'Sukses menambah pengiriman baru');
        

    }

    //     public function batal_pengiriman($id)
    // {
    //     $dataAdmin = PengirimanAdmin::find($id);
    //     $dataToko = PengirimanToko::find($id);

    //     dd($dataAdmin);
    //     if ($dataAdmin) {
    //         $status = $dataAdmin->id_status_pengiriman;

    //         if ($status == 1) {
    //             $dataAdmin->delete();
    //             if ($dataToko) {
    //                 $idProduk = $dataToko->id_produk;
    //                 $dataToko->delete();
    //                 TokoProduk::where('id_produk', $idProduk)->delete();
    //             }
    //             return redirect()->back()->with(['success' => 'Data Berhasil dihapus']);
    //         } else {
    //             return redirect()->back()->with(['error' => 'Tidak dapat menghapus data']);
    //         }
    //     } else {
    //         return redirect()->back()->with(['error' => 'Pengiriman tidak ditemukan']);
    //     }
    // }

    public function batal_pengiriman($id)
    {
        if (Gate::allows('mitra')) {
            $pengirimanAdmin = PengirimanAdmin::find($id);
            if ($pengirimanAdmin->id_status_pengiriman == 1) {
                $pengirimanAdmin->delete();
            } else {
                return redirect()->back();
            }
        } elseif (Gate::allows('admin')) {
            $pengirimanToko = PengirimanToko::find($id);
            if ($pengirimanToko->id_status_pengiriman == 1) {
                $id_produk = $pengirimanToko->id_produk;
                $id_toko = $pengirimanToko->id_toko;

                $pengirimanToko->delete();

                $tokoProduk = TokoProduk::where('id_produk', $id_produk)
                ->where('id_toko', $id_toko)
                    ->first();

                if ($tokoProduk) {
                    $tokoProduk->delete();
                }
            } else {
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

        // if (auth()->user()->role->role == "mitra" ) {
            // CARI DATA PENGIRIMAN ADMIN DENGAN ID
            // CEK STATUS PENGIRIMAN
                // hapus data pengiriman admin
        // } else if (auth()->user()->role->role == "admin") {
            // CARI DATA PENGIRIMAN TOKO DENGAN ID
            // CEK STATUS PENGIRIMAN
                // HAPUS DATA PENGIRIMAN TOKO
                // CARI DATA TOKO PRODUKS YANG MEMILIKI ID_PRODUK dan ID_TOKO YANG SAMA
                // HAPUS DATA TOKO PRODUKS
        // }


        
        // $dataAdmin = PengirimanAdmin::find($id);
        // $dataToko = PengirimanToko::find($id);
        // $tokoProduk = TokoProduk::find($id)

        // if ($dataAdmin) {
        //     $status = $dataAdmin->id_status_pengiriman;

        //     if ($status == 1) {
        //         $dataAdmin->delete();
              
        //         return redirect()->back()->with(['success' => 'Data Berhasil dihapus']);
        //     } else {
        //         return redirect()->back()->with(['error' => 'Tidak dapat menghapus data']);
        //     }
        // }elseif($dataToko) {
        //     $status = $dataAdmin->id_status_pengiriman;
        //     if ($status==1){
                
        //     }
        //     return redirect()->back()->with(['error' => 'Pengiriman tidak ditemukan']);
        // }

    // public function batal_pengiriman1($id)
    // {
    //     if (Gate::allows('admin')) {
    //         $dataToko = PengirimanToko::find($id);
    //         $status = $dataToko->id_status_pengiriman;
    //     } if ($status )




    // public function belum_dikirim(Pengajuan $pengajuan)
    // {
    //     $datapengajuan = Pengajuan::find($pengajuan->id);
    //     $datapengajuan["id_status_pengajuan"] = 2;
    //     $data = $datapengajuan->toArray();
    //     Pengajuan::where('id', $datapengajuan->id)->update($data);
    //     // dd($a);
    //     return redirect('/detail_pengajuan/' . $datapengajuan->id);
    // }

    // public function sedang_dikirim($id)
    // {
    //     $pengirimanAdmin = PengirimanAdmin::find($id);
    //     $pengirimanToko = PengirimanToko::find($id);

    //     $pengiriman = $pengirimanAdmin ?? $pengirimanToko;
    //     // $pengiriman = PengirimanAdmin::find($id);
    //     $pengiriman["id_status_pengiriman"] = 2;
    //     $data = $pengiriman->toArray();
    //     PengirimanAdmin::where('id', $id)->update($data);
    //     PengirimanToko::where('id', $id)->update($data);

    //     return redirect('/detailPengiriman/' . $id)->with(compact('pengiriman'));
    // }

    public function sedang_dikirim($id)
    {
        $pengirimanAdmin = PengirimanAdmin::find($id);
        $pengirimanToko = PengirimanToko::find($id);

        if ($pengirimanAdmin) {
            $pengirimanAdmin->id_status_pengiriman = 2;
            $pengirimanAdmin->save();
        } elseif ($pengirimanToko) {
            $pengirimanToko->id_status_pengiriman = 2;
            $pengirimanToko->save();
        }

        return redirect()->back();
    }


    public function sudah_dikirim($id)
    {
        $pengirimanAdmin = PengirimanAdmin::find($id);
        $pengirimanToko = PengirimanToko::find($id);

        if ($pengirimanAdmin) {
            $pengirimanAdmin->id_status_pengiriman = 3;
            $pengirimanAdmin->save();
        } elseif ($pengirimanToko) {
            $pengirimanToko->id_status_pengiriman = 3;
            $pengirimanToko->save();
        }

        return redirect()->back();
    }
}
