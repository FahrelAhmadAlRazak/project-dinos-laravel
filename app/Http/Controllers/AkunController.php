<?php

namespace App\Http\Controllers;

use App\Models\dataAkunAdmin;
use App\Models\dataAkunKurir;
use App\Models\dataAkunMitra;
use App\Models\dataKota;
use App\Models\dataProvinsi;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{

    public function show_signup() {
        $provinsi = Provinsi::all();
        return view('signup',compact('provinsi'));
    }

    public function signup(Request $request) {
        $validate = $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'username' => 'required',
            'no_identitas'=> 'required',
            'email' => 'required|email',
            'no_telepon' =>'required',
            'tanggal_lahir' =>'required',
            'jalan' =>'required',
            'id_provinsi'=> 'required',
            'id_kota'=> 'required',
            'id_role' => 'required'
        ]);
        $validate['password'] = bcrypt($request['password']);
        $user = new User([
            'nama' => $validate['nama'],
            'password' => $validate['password'],
            'username' => $validate['username'],
            'no_identitas'=> $validate['no_identitas'],
            'email' => $validate['email'],
            'no_telepon' => $validate['no_telepon'],
            'tanggal_lahir' => $validate['tanggal_lahir'],
            'jalan' => $validate['jalan'],
            'id_provinsi'=> $validate['id_provinsi'],
            'id_kota'=> $validate['id_kota'],
            'id_role' => $validate['id_role']
        ]);
        $user->save();

        return redirect('signin')->with('successsignup','akun berhasil di buat');

    }

    public function show_signin() {
        return view('signin');
    }

    public function signin(Request $request){
        // @dd($request);
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // @dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        return redirect()->back()->with(['message' => '']);
    }

    public function show_akun(){
        return view('akun');
    }

    public function checkPassword(Request $request){
        if (Hash::check( $request['password'], Auth::user()->getAuthPassword())) {
            return redirect()->route('show_edit_akun')->with(['validated' => true]);
        }
        return back();
        
    }

    public function show_edit_akun(){
        
        $provinsi = Provinsi::all();
        $validated = session('validated', false);
        return view('akunEdit', compact('provinsi', 'validated'));
    }

    public function edit_akun(Request $request) {
        // dd($request);
        $validate = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'no_identitas'=> 'required',
            'email' => 'required|email',
            'no_telepon' =>'required',
            'tanggal_lahir' =>'required',
            'jalan' =>'required',
            'id_provinsi'=> 'required',
            'id_kota'=> 'required',
            'id_role' => 'required'
        ]);
        
        $validate['password'] = bcrypt($request['password']);
        // dd($validate);
        User::where('id', auth()->user()->id)->update($validate);

        return redirect()->route('show_akun')->with(['validated' => true]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    


    


    

    public function showDataPartner()
    {
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        $dataMitra = dataAkunMitra::all();
        $dataKurir = dataAkunKurir::all();
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('partnerMitra', compact('dataMitra','dataKurir'));
    }

    public function showDataPartner_1()
    {
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        $dataMitra = dataAkunMitra::all();
        $dataKurir = dataAkunKurir::all();
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('partnerKurir', compact('dataMitra','dataKurir'));
    }

    public function showDataAkunMitra($id)
    {
        $dataAkunMitra = dataAkunMitra::find($id);

        // @dd($dataDetailPengajuan);
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        // $dataDetailPengajuan = dataDetailPengajuan::findOrFail($id);

        // $idDetailPengajuan = dataDetailPengajuan::find($id);
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('detailPartnerMitra', compact('dataAkunMitra'));

    }

    public function showDataAkunKurir($id)
    {
        $dataAkunKurir = dataAkunKurir::find($id);
        // @dd($dataDetailPengajuan);
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        // $dataDetailPengajuan = dataDetailPengajuan::findOrFail($id);

        // $idDetailPengajuan = dataDetailPengajuan::find($id);
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('detailPartnerKurir', compact('dataAkunKurir'));

    }

}
