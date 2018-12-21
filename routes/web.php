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
            $pelanggans = App\Pelanggan::all();
            return view('pemilik.index',compact('pelanggans'));
        }
    });
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('vendor', 'VendorController');
    Route::resource('kredit', 'KreditController');
    Route::resource('barang', 'BarangController');
    Route::get('kredit/{id}/detail','KreditController@kredit_detail')->name('kredit.detail');
    Route::post('kredit/cari','KreditController@cari')->name('kredit.cari');
    Route::post('img/{id}', 'PelangganController@ubah_img')->name('ubah_img');
    Route::post('img/{id}/add', 'PelangganController@add_img')->name('add_img');
    Route::get('img/{id}/delete', 'PelangganController@delete_img')->name('delete_img');
});
Auth::routes();
Route::get('tes', function () {
    $data = App\Pelanggan::all();
return view('tes',compact('data'));
});
Route::post('addItem','KreditController@tes')->name('tes');
Route::get('/home', 'HomeController@index')->name('home');
