<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\dataKota;
use App\Models\dataProvinsi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash(){
        $var_nama= "Fahrel Ahmad Al Razak";
        return view('dashboard',compact('var_nama'));
    }

    public function akun(){
        return view('akun');
    }

    public function akunEdit(){
        
            $kota = dataKota::all();
            $provinsi = dataProvinsi::all();
            
            
            
        

        return view('akunEdit',compact('kota','provinsi'));
    }


//     public function pengajuan(){
//         return view('pengajuan');
//     }

//     public function artikel_dashboard()
// {
//     // $artikel = Artikel::where('id', 1)->first();
//     $artikel = Artikel::all();

//     return view('dashboard', compact('artikel'));
// }

public function artikel_dashboard()
{
    $artikel = Artikel::all();

    foreach ($artikel as $item) {
        $item->formatted_created_at = Carbon::parse($item->created_at)->format('d M Y H:i:s');
    }

    return view('dashboard', compact('artikel'));
}
    
}
