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
            return redirect('/dashboard_all');
        }
        return redirect()->back()->with(['error' => 'Masukkan kembali Email dan password!']);
    }

    public function show_akun(){
        return view('akun');
    }

    public function checkPassword(Request $request){
        if (Hash::check( $request['password'], Auth::user()->getAuthPassword())) {
            return redirect()->route('show_edit_akun')->with(['validated' => true]);
        }
        return back()->with('error','Password yang anda masukkan salah!');
        
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

        // $s = auth()->user()->getAuthPassword();
        // dd($s);

        if($request['password']){
            $validate['password'] = Hash::make($request['password']);
        }else{
            $validate['password'] = Auth::user()->getAuthPassword();
        }
        

        // $validate['password'] = bcrypt($request['password']);
        // dd($validate);
        User::where('id', auth()->user()->id)->update($validate);
        // dd($s);
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
        // $users = User::all();
        $users = User::where('id_role',  1)->get();
        // dd($users);
        
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('partnerMitra', compact('users'));
    }

    public function showDataPartner_1()
    {
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        $users = User::where('id_role',  2)->get();
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('partnerKurir',  compact('users'));
    }

    public function showDataAkunMitra($id)
    {
        $users = User::find($id);

        // @dd($dataDetailPengajuan);
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        // $dataDetailPengajuan = dataDetailPengajuan::findOrFail($id);

        // $idDetailPengajuan = dataDetailPengajuan::find($id);
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('detailPartnerMitra', compact('users'));

    }

    public function showDataAkunKurir($id)
    {
        $users = User::find($id);
        // @dd($dataDetailPengajuan);
        // $dataPengajuan = dataPengajuan::all();
        // $dataPerusahaan = dataPerusahaan::all();
        // $dataProduk = dataProduk::all();
        // $dataDetailPengajuan = dataDetailPengajuan::findOrFail($id);

        // $idDetailPengajuan = dataDetailPengajuan::find($id);
        // $dataDetailPengajuan = dataDetailPengajuan::find(3);

        // dd($dataPengajuan, $dataPerusahaan, $dataProduk, $dataDetailPengajuan);
        // @dd($dataDetailPengajuan->dataProduk());

        return view('detailPartnerKurir', compact('users'));

    }

}
