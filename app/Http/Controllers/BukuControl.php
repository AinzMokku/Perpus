<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BukuReqVal;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MBuku;
use App\MPengarang;
use App\MPenerbit;
use App\MKategori;

class BukuControl extends Controller
{
    function Index(){
       // cara query builder
       // $buku = DB::select('SELECT tb_buku.kd_buku,tb_buku.judul,tb_pengarang.nama_pengarang,tb_penerbit.nama_penerbit,tb_buku.tempat_terbit,tb_kategori.nama_kategori,tb_buku.halaman,tb_buku.halaman,tb_buku.edisi,tb_buku.ISBN FROM tb_buku LEFT JOIN tb_pengarang ON tb_buku.kd_pengarang = tb_pengarang.kd_pengarang LEFT JOIN tb_penerbit ON tb_buku.kd_penerbit = tb_penerbit.kd_penerbit LEFT JOIN tb_kategori ON tb_buku.kd_kategori = tb_kategori.kd_kategori');
        // elequen
        $buku = Mbuku::all();
        return view('data.data_buku',compact('buku'));
    }

    function add(){
        $buku = MGlobal::Get_Row_Empty('tb_buku');
        $pengarang = MPengarang::all();
        $penerbit = MPenerbit::all();
        $kategori = MKategori::all();
        return view('form.frm_buku',compact('buku','pengarang','penerbit','kategori'));        
    }
    function edit($kd_buku){
        $buku = Mbuku::where('kd_buku',$kd_buku)->first();
        $pengarang = MPengarang::all();
        $penerbit = MPenerbit::all();
        $kategori = MKategori::all();
        return view('form.frm_buku',compact('buku','pengarang','penerbit','kategori'));      
    }

    function save(BukuReqVal $req){

        if($req->file('foto')){
            $foto = $req->file('foto');
            $nama_foto = date('m-Y-').$foto->getClientOriginalName();
        } else {
            $nama_foto = $req->file('old_foto');
        }

        if($req->get('kd_buku')==""){

            $buku = new MBuku([
                'judul'         => $req->get('judul'),
                'kd_pengarang'  => $req->get('pengarang'),
                'kd_penerbit'   => $req->get('penerbit'),
                'tempat_terbit' => $req->get('tempat_terbit'),
                'tahun_terbit'  => $req->get('tahun_terbit'),
                'kd_kategori'   => $req->get('kategori'),
                'halaman'       => $req->get('halaman'),
                'edisi'         => $req->get('edisi'),
                'isbn'          => $req->get('isbn'),
                'cover'         => $nama_foto,
            ]);
            $buku->save();
        } else {
            $buku = MBuku::where("kd_buku",$req->get("kd_buku"));
            $buku->update([
                'judul'         => $req->get('judul'),
                'kd_pengarang'  => $req->get('pengarang'),
                'kd_penerbit'   => $req->get('penerbit'),
                'tempat_terbit' => $req->get('tempat_terbit'),
                'tahun_terbit'  => $req->get('tahun_terbit'),
                'kd_kategori'   => $req->get('kategori'),
                'halaman'       => $req->get('halaman'),
                'edisi'         => $req->get('edisi'),
                'isbn'          => $req->get('isbn'),
                'cover'         => $nama_foto,
            ]);

        }
        if($req->file('foto')){
            $foto->move(public_path()."/img", $nama_foto);
        }
            return redirect('buku');
    }

    function delete($kd_buku){
        $buku = MBuku::where("kd_buku",$kd_buku);
        $buku->delete();
        return redirect('buku');
    }
}
