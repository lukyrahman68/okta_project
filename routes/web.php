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
use App\Pelanggan;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/loginpelanggan', function () {
    return view('karyawan.pelanggan.login');
})->name('b');
Route::post('pelangganlogin', 'PelangganController@login')->name('pelangganlogin');
Route::get('halpelanggan', function () {
    if (session()->has('nik')) {
        $tenor = App\Kredit::where('kredits.sts',4)
                                    ->where('pelanggans.nik','=',session('nik'))
                                    ->join('kredit_details','kredit_details.kredit_id','=','kredits.id')
                                    ->join('pelanggans','kredits.pelanggan_id','=','pelanggans.id')
                                    ->get();
        $bayar = App\Pembayaran::where('pelanggan_id','=',session('id'))
                                    ->where('status','=','1')
                                    ->get();
        $status=0;
        $hitung=0;
        if ($bayar->count()){
            $status=1;
            $hitung=$bayar->count();
        }
        return view('pelanggan.index',compact('tenor','bayar','status','hitung'));
    }
    return redirect()->route('b');
})->name('dashboardpelanggan');
Route::get('uploadpembayaran', function () {
    if (session()->has('nik')) {
        return view('pelanggan.upload');
    }
    return redirect()->route('b');
})->name('uploadpembayaran');
Route::post('uploadberkaspembayaran', 'PembayaranController@store')->name('uploadberkaspembayaran');
Route::get('jadwalpembayaran', function () {
    if (session()->has('nik')) {
        return view('pelanggan.jadwalpembayaran');
    }
    return redirect()->route('b');
})->name('jadwalpembayaran');
Route::get('informasikredit', function () {
    if (session()->has('nik')) {
        $kredit = App\Kredit::where('kredits.sts',4)->where('kredits.pelanggan_id','=',session('id'))
                            ->join('barangs','barangs.id','=','kredits.barang_id')
                            ->join('pelanggans','pelanggans.id','=','kredits.pelanggan_id')
                            ->join('kredit_details','kredit_details.kredit_id','=','kredits.id')
                            ->selectraw('*, barangs.nama a')
                            ->get();
        $kredit_info = App\Kredit::join('kredit_details','kredit_details.kredit_id','kredits.id')
                        ->join('barangs','barangs.id','kredits.barang_id')
                        ->where('kredits.pelanggan_id','=',session('id'))
                        ->where('kredits.sts','=','4')
                        ->selectRaw('kredits.no_kontrak,kredit_details.cicilan,barangs.harga,kredit_details.lama_cicilan')
                        ->first();
        $cicilan = unserialize($kredit_info->cicilan);
        $total_angsuran =[];
        // $sisa_pinjaman = $kredit_info->harga;
        $sisa_pinjaman = [];
        $a = $kredit_info->harga;
        $angsuran_pokok = floor($kredit_info->harga/$kredit_info->lama_cicilan);
        for ($i=0; $i <sizeof($cicilan) ; $i++) {
            # code...
            $total_angsuran[$i] = $angsuran_pokok + $cicilan[$i];
            $a = $a-$angsuran_pokok;
            array_push($sisa_pinjaman, $a);
        }
        return view('pelanggan.informasi',compact('kredit','cicilan','angsuran_pokok','total_angsuran','sisa_pinjaman','kredit_info'));
    }
    return redirect()->route('b');

})->name('informasikredit');
Route::get('/tes2', function () {
    return view('pemilik.index');
});
Route::get('/tambahkaryawan', function () {
    return view('pemilik.register');
})->name('karyawan.tambah');
Route::get('/tambahkaryawana', function () {
    $a=1;
    return view('pemilik.register',compact('a'));
})->name('karyawan.tambaha');
Route::get('/simulasi', function () {
    return view('karyawan.pelanggan.simulasi');
})->name('simulasi');
Route::group(['middleware' => ['auth']], function() {
    // your routes
    Route::get('/admin', function () {
    $user = Auth::user();
        if (!$user->is_owner) {
            $pelanggans = Pelanggan::all()->where('sts','!=','4');
            return view('karyawan.kredit.index',compact('pelanggans'));
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
    Route::get('approve/pembayaran','ApproveController@pembayaran_index')->name('pembayaran.index');
    Route::get('approve/pembayaran{id}/approve','ApproveController@pembayaran_approve')->name('pembayaran.approve');
    Route::get('approve/pembayaran{id}/tolak','ApproveController@pembayaran_tolak')->name('pembayaran.tolak');
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
    Route::delete('survey/pertayaan/proses/{id}/hapus','SurveyController@hapus_hasil')->name('survey.hapus_hasil');
    Route::PUT('survey/pertayaan/proses/{id}/edit','SurveyController@edit_hasil')->name('survey.edit_hasil');

    //laporan
    Route::get('laporan/pembayaran','PembayaranController@pembayaran')->name('laporan.pembayaran');
    Route::get('laporan/pendapatan','PembayaranController@pendapatan')->name('laporan.pendapatan');
    Route::get('laporan/piutang','PembayaranController@piutang')->name('laporan.piutang');
    Route::post('proseslaporan/pembayaran','PembayaranController@pembayaran2')->name('proseslaporan.pembayaran');
    Route::post('proseslaporan/pendapatan','PembayaranController@pendapatan2')->name('proseslaporan.pendapatan');
    Route::get('proseslaporan/cetak/{a}/{b}','PembayaranController@cetak')->name('pendapatan.cetak');
    Route::get('proseslaporan/cetak_pembayaran/{a}/{b}','PembayaranController@cetak_pembayaran')->name('pembayaran.cetak');
    Route::get('piutang/cetak_piutang/{a}/{b}','PembayaranController@cetak_piutang')->name('piutang.cetak');
    Route::post('proseslaporan/piutang','PembayaranController@piutang2')->name('proseslaporan.piutang');
    //profile
    Route::resource('profile', 'ProfileController');

    //notif
    Route::get('notif','NotifController@index')->name('notif.index');
    Route::post('notif/cari','NotifController@cari')->name('notif.cari');
    Route::post('notif/kirim','NotifController@kirim')->name('notif.kirim');



});
//karyawan
Route::resource('karyawan', 'KaryawanController');
Auth::routes();
Route::get('tes', function () {
    $data = App\Pelanggan::all();
return view('tes',compact('data'));
});
Route::post('addItem','KreditController@tes')->name('tes');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tes', 'HomeController@tes')->name('home');

