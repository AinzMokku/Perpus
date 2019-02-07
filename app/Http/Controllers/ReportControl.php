<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use App\MAnggota;
use App\MKoleksi;

class ReportControl extends Controller
{
    function rpt_anggota(){
        $anggota = MAnggota::all();
        $content = view('report.rpt_anggota',compact('anggota'));

        $pdf = new Mpdf([
            'orientation'=>"L",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Anggota.pdf','I');
    }

    function rpt_QRCode_Buku(){
        $buku = MKoleksi::all();

        $content = view('report.rpt_qrcode_buku',compact('buku'));

        $pdf = new Mpdf([
            'orientation'=>'P',
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan QR Code Buku.pdf','I');
    }
}
// I untuk dilihat D untuk download dan liat F jadi format file