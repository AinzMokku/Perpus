<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BukuReqVal;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MBuku;
use App\MPeminjaman;
use App\MKoleksi;

class DashboardControl extends Controller
{
    //
    function jumlah_buku(){
        $Dbuku = MBuku::all();
        $buku = DB::select('select count(*) as jumlah from tb_buku');
        $jbuku = $buku[0]->jumlah;
        $anggota = DB::select('select count(*) as jumlah from tb_anggota');
        $janggota = $anggota[0]->jumlah;
        $tersedia = DB::select('select count(*) as jumlah from tb_koleksi_buku where status = 0');
        $jtersedia = $tersedia[0]->jumlah;
        $terpinjam = DB::select('select count(*) as jumlah from tb_koleksi_buku where status = 1');
        $jterpinjam = $terpinjam[0]->jumlah;
        $rusak = DB::select('select count(*) as jumlah from tb_koleksi_buku where status = 2');
        $jrusak = $rusak[0]->jumlah;
        $hilang = DB::select('select count(*) as jumlah from tb_koleksi_buku where status = 3');
        $jhilang = $hilang[0]->jumlah;
        return view('dashboard', compact('jbuku','janggota','Dbuku','jtersedia','jterpinjam','jrusak','jhilang'));
    }
}