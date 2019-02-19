<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BukuReqVal;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MBuku;
use App\MPeminjaman;

class DashboardControl extends Controller
{
    //
    function jumlah_buku(){
        $Dbuku = MBuku::all();
        $buku = DB::select('select count(*) as jumlah from tb_buku');
        $jbuku = $buku[0]->jumlah;
        $anggota = DB::select('select count(*) as jumlah from tb_anggota');
        $janggota = $anggota[0]->jumlah;
        $terpinjam = DB::select('select count(*) as jumlah from tb_peminjaman where status = 0');
        $jterpinjam = $terpinjam[0]->jumlah;
        return view('dashboard', compact('jbuku','janggota','Dbuku','jterpinjam'));
    }
}