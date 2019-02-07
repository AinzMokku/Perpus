@extends('tamplate')

@section('judul')
Data Anggota
@stop

@section('ac-anggota')
active
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{ url('anggota/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Lahir</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($anggota as $rsAng)
                <tr>
                    <td>{{ $rsAng['kd_anggota'] }}</td>
                    <td>{{ $rsAng['no_anggota'] }}</td>
                    <td>{{ $rsAng['nama'] }}</td>
                    <td>{{ $rsAng['tempat']." , ".$rsAng['tgl_lahir'] }}</td>
                    <td>{{ $rsAng['alamat']." ".$rsAng['kota'] }}</td>
                    <td>{{ $rsAng['email'] }}</td>
                    <td>
                    <a href="{{ url('anggota/edit',$rsAng['kd_anggota']) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                    <a onclick="return Confirm_Delete(this)" link="/anggota/delete/{{ $rsAng->kd_anggota }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop