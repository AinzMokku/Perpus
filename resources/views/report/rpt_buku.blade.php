<style>
table { position:relative; border-collapse:collapse; width:100%; }
table td { border:1px solid #000; padding: 5px; }
h1,h2,p { margin: 0; text-align:center;}
p { padding-bottom: 15px; margin-bottom: 15px; border-bottom: 8px double #000; }
.title { background: #ccc; }
</style>

<h1>PERPUSTAKAAN UMUM</h1>
<h2>WEARNES EDUCATION CENTER MADIUN</h2>
<p>Jl Thamrin 35 A Madiun, Telp : (0351) 456789 , www.wearneslib.com, perous@wearneslib.com</p>

<table>
    <tr class="title">
        <td width="3%">#</td>
        <td width="23%">Judul</td>
        <td width="19%">Pengarang</td>
        <td width="21%">Penerbit</td>
        <td width="10%">Kategori</td>
        <td width="4%">Halaman</td>
        <td width="8%">Edisi</td>
        <td width="12%">ISBN</td>
    </tr>
    @foreach($buku as $rsBuku)
    <tr>
        <td>{{ $rsBuku->kd_buku }}</td>
        <td>{{ $rsBuku->judul }}</td>
        <td>{{ App\MGlobal::Get_Pengarang($rsBuku->kd_pengarang) }}</td>
        <td>{{ App\MGlobal::Get_Penerbit($rsBuku->kd_penerbit)." / ".$rsBuku->tempat_terbit."/".$rsBuku->tahun_terbit }}</td>
        <td>{{ App\MGlobal::Get_Kategori($rsBuku->kd_kategori) }}</td>
        <td>{{ $rsBuku->halaman }}</td>
        <td>{{ $rsBuku->edisi }}</td>
        <td>{{ $rsBuku->ISBN }}</td>
    </tr>
    @endforeach
</table>