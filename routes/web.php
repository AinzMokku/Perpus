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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');    
    });

    Route::get('/anggota','AnggotaControl@index');
    Route::get('/anggota/add','AnggotaControl@add');
    Route::post('/anggota/save','AnggotaControl@save');
    Route::get('/anggota/delete/{kd_anggota}','AnggotaControl@delete');
    Route::get('/anggota/edit/{kd_anggota}','AnggotaControl@edit');

    Route::get('/buku','BukuControl@index');
    Route::get('/buku/add','BukuControl@add');
    Route::post('/buku/save','BukuControl@save');
    Route::get('/buku/delete/{kd_buku}','BukuControl@delete');
    Route::get('/buku/edit/{kd_buku}','BukuControl@edit');

    Route::get('/pengarang','PengarangControl@index');
    Route::get('/pengarang/add','PengarangControl@add');
    Route::post('/pengarang/save','PengarangControl@save');
    Route::get('/pengarang/delete/{kd_pengarang}','PengarangControl@delete');
    Route::get('/pengarang/edit/{kd_pengarang}','PengarangControl@edit');

    Route::get('/penerbit','PenerbitControl@index');
    Route::get('/penerbit/add','PenerbitControl@add');
    Route::post('/penerbit/save','PenerbitControl@save');
    Route::get('/penerbit/delete/{kd_penerbit}','PenerbitControl@delete');
    Route::get('/penerbit/edit/{kd_penerbit}','PenerbitControl@edit');

    Route::get('/koleksi','KoleksiControl@index');
    Route::get('/koleksi/add','KoleksiControl@add');
    Route::post('/koleksi/save','KoleksiControl@save');
    Route::get('/koleksi/delete/{kd_koleksi}','KoleksiControl@delete');
    Route::get('/koleksi/edit/{kd_koleksi}','KoleksiControl@edit');

    Route::get('/rak','RakControl@index');
    Route::get('/rak/add','RakControl@add');
    Route::post('/rak/save','RakControl@save');
    Route::get('/rak/delete/{kd_rak}','RakControl@delete');
    Route::get('/rak/edit/{kd_rak}','RakControl@edit');

    Route::post('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::get('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::post('/trans/peminjaman/save','TransaksiControl@save_peminjaman');

    Route::post('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::get('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::post('/trans/pengembalian/save','TransaksiControl@save_pengembalian');


    Route::get('/kategori','KategoriControl@index');
    Route::get('/kategori/add','KategoriControl@add');
    Route::post('/kategori/save','KategoriControl@save');
    Route::get('/kategori/delete/{kd_kategori}','KategoriControl@delete');
    Route::get('/kategori/edit/{kd_kategori}','KategoriControl@edit');

    route::get('/report/anggota','ReportControl@rpt_anggota');
    route::get('/report/qrcode_buku','ReportControl@rpt_QRCode_Buku');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
