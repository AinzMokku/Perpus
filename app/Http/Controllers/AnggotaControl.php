<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnggotaReqVal;
use Illuminate\Support\Facades\DB;
use App\MAnggota;
use App\MGlobal;

class AnggotaControl extends Controller
{
    function Index(){
        $anggota = MAnggota::all();
        return view('data.data_anggota',compact('anggota'));
    }

    function add(){
        $anggota = MGlobal::Get_Row_Empty('tb_anggota');
        return view('form.frm_anggota',compact('anggota'));        
    }
    function edit($kd_anggota){
        $anggota = MAnggota::where('kd_anggota',$kd_anggota)->first();
        return view('form.frm_anggota',compact('anggota'));        
    }

    function save(AnggotaReqVal $req){

        if($req->file('foto')){
            $foto = $req->file('foto');
            $nama_foto = date('m-Y-').$foto->getClientOriginalName();
        } else {
            $nama_foto = $req->file('old_foto');
        }

        if($req->get('kd_anggota')==""){

            $newid = DB::select('SHOW TABLE STATUS LIKE "tb_anggota"');
            $noanggota = date("Ym").sprintf('%04d',$newid[0]->Auto_increment);

            $anggota = new MAnggota([
                'no_anggota'    => $noanggota,
                'nama'          => $req->get('nama'),
                'tempat'        => $req->get('tempat'),
                'tgl_lahir'     => date("Y-m-d",strtotime($req->get('tgl_lahir'))),
                'jk'            => $req->get('jk'),
                'alamat'        => $req->get('alamat'),
                'kota'          => $req->get('kota'),
                'telp'          => $req->get('telp'),
                'email'         => $req->get('email'),
                'user_name'     => $req->get('user_name'),
                'user_password' => md5($req->get('user_password')),
                'foto'          => $nama_foto,
                'status'        => 1,
            ]);
            $anggota->save();
        } else {
            $anggota = MAnggota::where("kd_anggota",$req->get("kd_anggota"));
            $anggota->update([
                'nama'          => $req->get('nama'),
                'tempat'        => $req->get('tempat'),
                'tgl_lahir'     => date("Y-m-d",strtotime($req->get('tgl_lahir'))),
                'jk'            => $req->get('jk'),
                'alamat'        => $req->get('alamat'),
                'kota'          => $req->get('kota'),
                'telp'          => $req->get('telp'),
                'email'         => $req->get('email'),
                'user_name'     => $req->get('user_name'),
                'user_password' => $req->get('user_password')!="" ? md5($req->get('user_password')) : $req->get('old_password'),
                'status'        => 1,
            ]);

        }
        if($req->file('foto')){
            $foto->move(public_path()."/img", $nama_foto);
        }
            return redirect('anggota');
    }

    function delete($kd_anggota){
        $anggota = MAnggota::where("kd_anggota",$kd_anggota);
        $anggota->delete();
        return redirect('anggota');
    }
}
