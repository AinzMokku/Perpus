<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PengarangReqVal;
use Illuminate\Support\Facades\DB;
use App\MPengarang;
use App\MGlobal;

class PengarangControl extends Controller
{
    function Index(){
        $pengarang = MPengarang::all();
        return view('data.data_pengarang',compact('pengarang'));
    }

    function add(){
        $pengarang = MGlobal::Get_Row_Empty('tb_pengarang');
        return view('form.frm_pengarang',compact('pengarang'));        
    }
    function edit($kd_pengarang){
        $pengarang = MPengarang::where('kd_pengarang',$kd_pengarang)->first();
        return view('form.frm_pengarang',compact('pengarang'));        
    }

    function save(PengarangReqVal $req){

        if($req->file('foto')){
            $foto = $req->file('foto');
            $nama_foto = date('m-Y-').$foto->getClientOriginalName();
        } else {
            $nama_foto = $req->file('old_foto');
        }

        if($req->get('kd_pengarang')==""){

            $newid = DB::select('SHOW TABLE STATUS LIKE "tb_pengarang"');
            $kdpengarang = $newid[0]->Auto_increment;

            $pengarang = new MPengarang([
                'nama_pengarang'  => $req->get('nama_pengarang'),
                'alamat'          => $req->get('alamat'),
                'email'           => $req->get('email'),
                'telp'            => $req->get('telp'),
                'foto'            => $nama_foto,
            ]);
            $pengarang->save();
        } else {
            $pengarang = MPengarang::where("kd_pengarang",$req->get("kd_pengarang"));
            $pengarang->update([
                'nama_pengarang'  => $req->get('nama_pengarang'),
                'alamat'          => $req->get('alamat'),
                'email'           => $req->get('email'),
                'telp'            => $req->get('telp'),
                'foto'            => $nama_foto,
            ]);

        }
        if($req->file('foto')){
            $foto->move(public_path()."/img", $nama_foto);
        }
            return redirect('pengarang');
    }

    function delete($kd_pengarang){
        $pengarang = MPengarang::where("kd_pengarang",$kd_pengarang);
        $pengarang->delete();
        return redirect('pengarang');
    }
}
