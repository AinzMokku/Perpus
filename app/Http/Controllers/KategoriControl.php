<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KategoriReqVal;
use Illuminate\Support\Facades\DB;
use App\MKategori;
use App\MGlobal;

class KategoriControl extends Controller
{
    function Index(){
        $kategori = MKategori::all();
        return view('data.data_kategori',compact('kategori'));
    }

    function add(){
        $kategori = MGlobal::Get_Row_Empty('tb_kategori');
        return view('form.frm_kategori',compact('kategori'));        
    }
    function edit($kd_kategori){
        $kategori = MKategori::where('kd_kategori',$kd_kategori)->first();
        return view('form.frm_kategori',compact('kategori'));        
    }

    function save(KategoriReqVal $req){

        if($req->get('kd_kategori')==""){

            $newid = DB::select('SHOW TABLE STATUS LIKE "tb_kategori"');
            $kdkategori = $newid[0]->Auto_increment;

            $kategori = new MKategori([
                'nama_kategori'  => $req->get('nama_kategori'),
                'singkatan'  => $req->get('singkatan'),
            ]);
            $kategori->save();
        } else {
            $kategori = MKategori::where("kd_kategori",$req->get("kd_kategori"));
            $kategori->update([
                'nama_kategori'  => $req->get('nama_kategori'),
                'singkatan'  => $req->get('singkatan'),
            ]);

        }
        return redirect('kategori');
    }

    function delete($kd_kategori){
        $kategori = MKategori::where("kd_kategori",$kd_kategori);
        $kategori->delete();
        return redirect('kategori');
    }
}
