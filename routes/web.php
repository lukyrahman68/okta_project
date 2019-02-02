<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/loginpelanggan', function () {
    return view('karyawan.pelanggan.login');
})->name('b');
Route::post('pelangganlogin', 'PelangganController@login')->name('a');
Route::get('/tes2', function () {
    return view('pemilik.index');
});
Route::group(['middleware' => ['auth']], function() {
    // your routes
    Route::get('/admin', function () {
    $user = Auth::user();
        if (!$user->is_owner) {
            return view('karyawan.index');
        } else {
            $kredits = App\Kredit::where('kredits.sts',0)
                                    ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                    ->join('barangs','kredits.barang_id','=','barangs.id')
                                    ->join('vendors','vendors.id','=','barangs.vendor_id')
                                    ->selectRaw('pelanggans.*,kredits.id as kredit_id, vendors.nama as vendor_nama, barangs.harga,barangs.nama as nama_brng')
                                    ->get();
            return view('pemilik.index',compact('kredits'));
        }
    });
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('vendor', 'VendorController');
    Route::resource('kredit', 'KreditController');
    Route::resource('barang', 'BarangController');

    //approve
    Route::resource('approve', 'ApproveController');
    Route::get('approve/detail/{id}/pelanggan','ApproveController@detail')->name('approve.detail');

    Route::get('survey/{id}/detail','SurveyController@bukti_survey')->name('survey.bukti_survey');
    Route::get('kredit/{id}/detail','KreditController@kredit_detail')->name('kredit.detail');
    Route::get('kredit/status/cek','KreditController@status')->name('kredit.status');
    Route::post('kredit/cari','KreditController@cari')->name('kredit.cari');
    Route::post('img/{id}', 'PelangganController@ubah_img')->name('ubah_img');
    Route::post('img/{id}/add', 'PelangganController@add_img')->name('add_img');
    Route::get('img/{id}/delete', 'PelangganController@delete_img')->name('delete_img');
    Route::get('approve/cari_img/{id}', 'ApproveController@cari_img')->name('cari_img');
    Route::get('kredit/proses/index/{id}', 'KreditController@proses')->name('kredit.proses');
    Route::post('kredit/proses/simpan', 'KreditController@simpan')->name('kredit.simpan');
    Route::get('kredit/history/index', 'KreditController@history')->name('kredit.history');

    //survey
    Route::resource('survey', 'SurveyController');
    Route::get('survey/pertayaan/proses','SurveyController@pertayaan')->name('survey.pertayaan');
    Route::get('survey/pertayaan/proses/{id}/olah','SurveyController@olah')->name('survey.olah');
    Route::post('survey/pertayaan/proses/simpan','SurveyController@simpan')->name('survey.simpan');

    //laporan
    Route::get('laporan/pembayaran','PembayaranController@pembayaran')->name('laporan.pembayaran');
    Route::get('laporan/pendapatan','PembayaranController@pendapatan')->name('laporan.pendapatan');
    Route::get('laporan/piutang','PembayaranController@piutang')->name('laporan.piutang');
});
Auth::routes();
Route::get('tes', function () {
    $data = App\Pelanggan::all();
return view('tes',compact('data'));
});
Route::post('addItem','KreditController@tes')->name('tes');
Route::get('/home', 'HomeController@index')->name('home');
