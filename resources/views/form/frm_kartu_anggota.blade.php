@extends('tamplate')

@section('judul')
Form Anggota
@stop

@section('content')



<div id="ukuran">
    
    <div class="qrcode">
        <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->Color(250,250,250)->size(58)->BackgroundColor(50,60,66)->generate($anggota->no_anggota)) }}" style="margin-left:217px; margin-top:81px; position:absolute;">
    </div>
    <!-- QR CODE -->
    <div class="foto" style="margin-top:30px; margin-left:27px; position:absolute; border-radius: 60%;">
        @if($anggota['foto'])
        <img id="avatar" style="width:50px; border-radius:30%;" src="{{ asset('img/'.$anggota['foto']) }}">
        @else
        <img id="avatar" style="width:50px; border-radius:30%;" src="{{ asset('img/no-image.png') }}">
        @endif
        <input id="file" type="file" name="foto" style="display: none">
        <input type="hidden" name="old_foto" value="{{ $anggota['foto'] }}">
    </div>
    <div class="semua">
        <h4 class="s" style="margin-left:79px; margin-top:37px; font-size:12px; position:absolute; color:#0e2024;"><strong>{{ $anggota->nama }}</strong></h4>
        <h5 class="t" style=" margin-left:43px; margin-top:99px; font-size:10px; position:absolute; color:#0e2024;"><strong>{{ $anggota->telp }}</strong></h5>
        <h5 class="t" style=" margin-left:43px; margin-top:122px; font-size:10px; position:absolute; color:#0e2024;"><strong>{{ $anggota->email }}</strong></h5>
        <h5 class="t" style=" margin-left:43px; margin-top:144px; font-size:10px; position:absolute; color:#0e2024;"><strong>{{ $anggota->kota." ".$anggota->alamat }}</strong></h5>
        <img src="{{ asset('img/id_card2.jpg') }}" style="width:80mm; height:53mm; border:1px solid black;"/>
        <div class="no" style=" margin-left:214px; margin-top:-71px; position:absolute; font-size:12px; font-style:arial;"><strong style="color:white;">{{ $anggota->no_anggota }}</strong></div>
        <div class="tanggal" style="margin-left:200px; margin-top:-8; position:absolute;
            font-size:6px;"><strong style="color:white;">{{ date('d / m / y',strtotime('+5 years')) }}</strong></div>
    </div>
<!-- Foto -->
</div>

<button id="cetak" class="btn pull-right">Cetak</button>

<script>
        (function($) {
            // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {
                 
                // aksi ketika tombol cetak ditekan
                $("#cetak").bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#ukuran').printArea();
                });
            });
        }) (jQuery);
    </script>

@stop 