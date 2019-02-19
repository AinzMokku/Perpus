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

Route::get('/',function() {
    return view('auth.login');
});

Route::group(['middleware' => ['isAdmin']], function() {

    Route::get('/anggota/add','AnggotaControl@add');
    Route::post('/anggota/save','AnggotaControl@save');
    Route::get('/anggota/delete/{kd_anggota}','AnggotaControl@delete');
    Route::get('/anggota/edit/{kd_anggota}','AnggotaControl@edit');

    Route::get('/buku/add','BukuControl@add');
    Route::post('/buku/save','BukuControl@save');
    Route::get('/buku/delete/{kd_buku}','BukuControl@delete');
    Route::get('/buku/edit/{kd_buku}','BukuControl@edit');

    Route::get('/pengarang/add','PengarangControl@add');
    Route::post('/pengarang/save','PengarangControl@save');
    Route::get('/pengarang/delete/{kd_pengarang}','PengarangControl@delete');
    Route::get('/pengarang/edit/{kd_pengarang}','PengarangControl@edit');

    Route::get('/penerbit/add','PenerbitControl@add');
    Route::post('/penerbit/save','PenerbitControl@save');
    Route::get('/penerbit/delete/{kd_penerbit}','PenerbitControl@delete');
    Route::get('/penerbit/edit/{kd_penerbit}','PenerbitControl@edit');

    Route::get('/koleksi/add','KoleksiControl@add');
    Route::post('/koleksi/save','KoleksiControl@save');
    Route::get('/koleksi/delete/{kd_koleksi}','KoleksiControl@delete');
    Route::get('/koleksi/edit/{kd_koleksi}','KoleksiControl@edit');

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

    Route::get('/kategori/add','KategoriControl@add');
    Route::post('/kategori/save','KategoriControl@save');
    Route::get('/kategori/delete/{kd_kategori}','KategoriControl@delete');
    Route::get('/kategori/edit/{kd_kategori}','KategoriControl@edit');

    Route::get('user','UsersControl@index');
    Route::get('user/add','UsersControl@add');
    Route::get('user/edit/{$id}','UsersControl@edit');
    Route::post('user/save','UsersControl@save');

});

Route::group(['middleware' => ['isOperator']], function() {
   
    Route::get('/anggota','AnggotaControl@index');
    Route::get('/buku','BukuControl@index');
    Route::get('/pengarang','PengarangControl@index');
    Route::get('/rak','RakControl@index');
    Route::get('/penerbit','PenerbitControl@index');
    Route::get('/koleksi','KoleksiControl@index');
    Route::get('/kategori','KategoriControl@index');

    Route::get('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::post('/trans/peminjaman','TransaksiControl@peminjaman');
    Route::post('/trans/peminjaman/save','TransaksiControl@save_peminjaman');

    Route::post('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::get('/trans/pengembalian','TransaksiControl@pengembalian');
    Route::post('/trans/pengembalian/save','TransaksiControl@save_pengembalian');

    route::get('/report/qrcode_buku','ReportControl@rpt_QRCode_Buku');  
    Route::get('/report/qrcode_anggota','ReportControl@QR_Code_Anggota');

    route::get('/report/anggota','ReportControl@rpt_anggota');
    route::get('/report/buku','ReportControl@rpt_buku');
    route::get('/report/buku_tersedia','ReportControl@rpt_buku_tersedia');
    route::get('/report/buku_dipinjam','ReportControl@rpt_buku_dipinjam');
    route::get('/report/kartu_anggota/{kd_anggota}','AnggotaControl@print_kartu');
    route::get('/report/buku_rusak','ReportControl@rpt_buku_rusak');
    route::get('/report/buku_hilang','ReportControl@rpt_buku_hilang');
});

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/dashboard','DashboardControl@jumlah_buku');

