<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{

    public function show_artikel(){

        $artikel = Artikel::all();

        return view('tambahArtikel',compact('artikel'));
    }
    public function tambahArtikel(Request $request) {
        
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required', 
        ]);
        Artikel::create([
            $gambar = $request->gambar,
            $gmbr = $gambar->getClientOriginalName(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $request->gambar->getClientOriginalName(),
            'id_author' => auth()->user()->id,
            $gambar->move(public_path().'/img',$gmbr),
            
            
        ]);
        return redirect('artikel');

    }

    public function show_artikel_all(){
        $artikel = Artikel::all();

        return view('artikel',compact('artikel'));

    }

    public function detail_artikel($id){
        $artikel = Artikel::find($id);

        return view('detail_artikel',compact('artikel'));

    }

    public function edit_artikel($id){
        $artikel = Artikel::find($id);

        return view('editArtikel',compact('artikel'));
    }

    public function update_artikel(Request $request,$id){
        // dd($request);
        
        $validate = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required',
        ]);
        
        $artikel_update = Artikel::find($id);
      
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gmbr = $gambar->getClientOriginalName();
            $gambar->move(public_path('img'), $gmbr);
            $validate['gambar'] = $gmbr;
            
        }
        $validate['id_author']=auth()->user()->id;
        
        $artikel_update->update($validate);

        
        return redirect('artikel');
    }

    // public function atikel_dashboard(){
    //     $artikel = Artikel::all();

    //     return view('');
    // }
    
    
}
