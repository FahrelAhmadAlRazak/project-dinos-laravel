<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('landing-page');
})->name('landing.page');


// Akun Controller
Route::get('/signup', [App\Http\Controllers\AkunController::class,'show_signup']) ->name('showsignup');
Route::post('/signup', [App\Http\Controllers\AkunController::class,'signup']) ->name('signup');

Route::get('/signin', [App\Http\Controllers\AkunController::class,'show_signin'])->name('showsignin');
Route::post('/signin', [App\Http\Controllers\AkunController::class,'signin'])->name('signin');

Route::get('/akun', [App\Http\Controllers\AkunController::class,'show_akun'])->name('show_akun');
Route::get('/editakun', [App\Http\Controllers\AkunController::class,'show_edit_akun'])->name('show_edit_akun');
Route::post('/editakun', [App\Http\Controllers\AkunController::class,'edit_akun'])->name('edit_akun');

Route::get('/logout', [App\Http\Controllers\AkunController::class,'logout']) ->name('logout');


// Pengajuan Controller
Route::get('/pengajuan', [App\Http\Controllers\PengajuanController::class,'pengajuan']) ->name('pengajuan');
Route::get('/showpengajuan',[App\Http\Controllers\PengajuanController::class,'show_pengajuan'])->name('show_pengajuan');
Route::get('/batal_pengajuan/{id}',[App\Http\Controllers\PengajuanController::class,'batal_pengajuan'])->name('batal_pengajuan');



Route::get('/dashboard_all', [App\Http\Controllers\DashboardController::class,'artikel_dashboard']) ->name('dashboard');


// Route::get('/dashboard_all', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/akun_all', function () {
    return view('akun');
})->name('akun');

Route::get('/pengajuan_all', function () {
    return view('pengajuan');
})->name('pengajuan');


Route::get('/buat_pengajuan_all-1', function () {
    return view('buatPengajuan-1');
})->name('buat_pengajuan-1');


// Fitur Pengiriman


Route::get('/pengiriman', function () {
    return view('pengiriman');
})->name('pengiriman');

Route::get('/tambahPengiriman', [App\Http\Controllers\PengirimanController::class,'formPengiriman'])->name('tambahPengiriman');
Route::post('/tambahPengirimanMitra', [App\Http\Controllers\PengirimanController::class,'tambahPengirimanMitra'])->name('tambahPengirimanMitra');
Route::post('/tambahPengirimanAdmin', [App\Http\Controllers\PengirimanController::class,'tambahPengirimanAdmin'])->name('tambahPengirimanAdmin');

Route::get('/lihatPengiriman', [App\Http\Controllers\PengirimanController::class,'lihatPengiriman'])->name('lihatPengiriman');
Route::get('/lihatPengiriman/{pengiriman}', [App\Http\Controllers\PengirimanController::class,'detailPengiriman'])->name('detailPengiriman');

Route::get('/batal_pengiriman/{id}',[App\Http\Controllers\PengirimanController::class,'batal_pengiriman'])->name('batal_pengiriman');


Route::get('/statusPengiriman', function () {
    return view('statusPengiriman');
})->name('statusPengiriman');





Route::get('/dataPartner', function () {
    return view('dataPartner');
})->name('dataPartner');

Route::get('/coba', function () {
    return view('coba');
})->name('coba');

Route::get('/monitor', [App\Http\Controllers\MonitorController::class,'monitor'])->name('monitor');
Route::get('/monitor/{monitor}', [App\Http\Controllers\MonitorController::class,'detailMonitor'])->name('detailMonitor');
Route::post('/updatestock/{monitor}', [App\Http\Controllers\MonitorController::class,'updateStock'])->name('updateStock');
Route::post('/tambahstock/{monitor}', [App\Http\Controllers\MonitorController::class,'tambahStok'])->name('tambahStock');






// Route::get('/data_pengajuan', function () {
//     return view('dataPengajuan');
// })->name('data_pengajuan');




Route::get('/landing-page', [App\Http\Controllers\LandingPageController::class,'index']) ->name('index');






Route::get('/edit', [App\Http\Controllers\AkunController::class,'edit']) ->name('edit');

// Route::post('/update', [App\Http\Controllers\AkunController::class,'update_akun']) ->name('update');

Route::get('/buat_pengajuan', [App\Http\Controllers\PengajuanController::class,'show']) ->name('show');

Route::post('/buat_pengajuan', [App\Http\Controllers\PengajuanController::class,'show']) ->name('show');







Route::group([],function(){
    
    
    
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'dash']) ->name('dash');

    

    Route::get('/akunEdit', [App\Http\Controllers\DashboardController::class,'akunEdit']) ->name('account_edit');

    

    Route::post('/cekpassword', [App\Http\Controllers\AkunController::class,'checkPassword']) ->name('cekPassword');
});



// Route::group(['middleware'=> ['auth','ceklevel:mitra']],function(){
    
    //     Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'dash']) ->name('dash');

//     Route::get('/akun', [App\Http\Controllers\DashboardController::class,'akun']) ->name('account');

//     Route::get('/akunEdit', [App\Http\Controllers\DashboardController::class,'akunEdit']) ->name('account_edit');

//     Route::get('/pengajuan', [App\Http\Controllers\DashboardController::class,'pengajuan']) ->name('pengaj');

// });

// Route::group(['middleware'=> ['auth','ceklevel:kurir']],function(){
    
//     Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'dash']) ->name('dash');

//     Route::get('/akun', [App\Http\Controllers\DashboardController::class,'akun']) ->name('account');

//     Route::get('/akunEdit', [App\Http\Controllers\DashboardController::class,'akunEdit']) ->name('account_edit');



// });


Route::get('/buat_pengajuan_all',[App\Http\Controllers\PengajuanController::class,'showKota'])->name('buat_pengajuan');





Route::post('/buat_pengajuan_all',[App\Http\Controllers\PengajuanController::class,'create'])->name('create_pengajuan');

Route::post('/buat_pengajuan_all-1',[App\Http\Controllers\PengajuanController_1::class,'create_1'])->name('create_pengajuan_1');




// Route::get('/setujuiPengajuan/{dataDetailPengajuan}',[App\Http\Controllers\PengajuanController::class,'setujuiPengajuan'])->name('setujuiPengajuan');

// Route::get('/detail_pengajuan/{id}',[App\Http\Controllers\PengajuanController::class,'showDetailDataPengajuan']);


Route::get('/detail_pengajuan/{id}',[App\Http\Controllers\PengajuanController::class,'showDetailDataPengajuan']);

Route::get('/setujuiPengajuan/{pengajuan}',[App\Http\Controllers\PengajuanController::class,'setujuiPengajuan'])->name('setujuiPengajuan');

Route::get('/tolakPengajuan/{pengajuan}',[App\Http\Controllers\PengajuanController::class,'tolakPengajuan'])->name('tolakPengajuan');
// Route::get('/buat_pengajuan_all',[App\Http\Controllers\ShowProvinsiController::class,'showProvinsi'])->name('buat_pengajuan1');




// Fitur Partner

Route::get('/parnerMitra',[App\Http\Controllers\AkunController::class,'showDataPartner'])->name('showDataPartner');

Route::get('/partnerKurir',[App\Http\Controllers\AkunController::class,'showDataPartner_1'])->name('showDataPartner_1');

Route::get('/detailPartnerMitra/{id}',[App\Http\Controllers\AkunController::class,'showDataAkunMitra'])->name('showDataAkunMitra');

Route::get('/detailPartnerKurir/{id}',[App\Http\Controllers\AkunController::class,'showDataAkunKurir'])->name('showDataAkunKurir');


// Fitur Artikel

Route::get('/detailArtikel/{id}',[App\Http\Controllers\ArtikelController::class,'detail_artikel'])->name('detail_artikel');

Route::get('/artikel',[App\Http\Controllers\ArtikelController::class,'show_artikel_all'])->name('artikel');

Route::get('/tambahArtikel',[App\Http\Controllers\ArtikelController::class,'show_artikel'])->name('showTambahArtikel');

Route::post('/tambahArtikel',[App\Http\Controllers\ArtikelController::class,'tambahArtikel'])->name('tambahArtikel');

Route::get('/editArtikel/{id}',[App\Http\Controllers\ArtikelController::class,'edit_artikel'])->name('edit_artikel');

Route::post('/editArtikel/{id}', [App\Http\Controllers\ArtikelController::class,'update_artikel'])->name('update_artikel');



// Fitur Pencatatan

Route::get('/pencatatan', function () {
    return view('pencatatan');
})->name('pencatatan');


Route::get('/tambahPencatatan', [App\Http\Controllers\PencatatanController::class,'show_tambah_pencatatan'])->name('show_tambah_pencatatan');

Route::post('/tambahPencatatan', [App\Http\Controllers\PencatatanController::class,'tambahPencatatan'])->name('tambahPencatatan');

Route::get('/lihatPencatatan', function () {
    return view('lihatPencatatan');
})->name('lihatPencatatan');





