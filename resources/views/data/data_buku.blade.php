@extends('tamplate')

@section('judul')
Data Anggota
@stop

@section('ac-buku')
active
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{ url('buku/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>halaman</th>
                <th>Edisi</th>
                <th>ISBN</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
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
                    <td>
                    <a href="{{ url('buku/edit',$rsBuku->kd_buku) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                    <a onclick="return Confirm_Delete(this)" link="/buku/delete/{{ $rsBuku->kd_buku }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop