<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PenerbitReqVal;
use Illuminate\Support\Facades\DB;
use App\MPenerbit;
use App\MGlobal;

class PenerbitControl extends Controller
{
    function Index(){
        $penerbit = MPenerbit::all();
        return view('data.data_penerbit',compact('penerbit'));
    }

    function add(){
        $penerbit = MGlobal::Get_Row_Empty('tb_penerbit');
        return view('form.frm_penerbit',compact('penerbit'));        
    }
    function edit($kd_penerbit){
        $penerbit = MPenerbit::where('kd_penerbit',$kd_penerbit)->first();
        return view('form.frm_penerbit',compact('penerbit'));        
    }

    function save(PenerbitReqVal $req){

        if($req->file('foto')){
            $foto = $req->file('foto');
            $nama_foto = date('m-Y-').$foto->getClientOriginalName();
        } else {
            $nama_foto = $req->file('old_foto');
        }

        if($req->get('kd_penerbit')==""){

            $newid = DB::select('SHOW TABLE STATUS LIKE "tb_penerbit"');
            $kdpenerbit = $newid[0]->Auto_increment;

            $penerbit = new MPenerbit([
                'nama_penerbit'  => $req->get('nama_penerbit'),
                'alamat'          => $req->get('alamat'),
                'telp'            => $req->get('telp'),
                'kota'            => $req->get('kota'),
                'email'           => $req->get('email'),
                'foto'            => $nama_foto,
            ]);
            $penerbit->save();
        } else {
            $penerbit = MPenerbit::where("kd_penerbit",$req->get("kd_penerbit"));
            $penerbit->update([
                'nama_penerbit'  => $req->get('nama_penerbit'),
                'alamat'          => $req->get('alamat'),
                'telp'            => $req->get('telp'),
                'kota'            => $req->get('kota'),
                'email'           => $req->get('email'),
                'foto'            => $nama_foto,
            ]);

        }
        if($req->file('foto')){
            $foto->move(public_path()."/img", $nama_foto);
        }
            return redirect('penerbit');
    }

    function delete($kd_penerbit){
        $penerbit = MPenerbit::where("kd_penerbit",$kd_penerbit);
        $penerbit->delete();
        return redirect('penerbit');
    }
}
