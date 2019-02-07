@extends('tamplate')

@section('judul')
Data Pengarang
@stop

@section('ac-pengarang')
active
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{ url('pengarang/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Pengarang</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($pengarang as $rsPengarang)
                <tr>
                    <td>{{ $rsPengarang->kd_pengarang }}</td>
                    <td>{{ $rsPengarang->nama_pengarang }}</td>
                    <td>{{ $rsPengarang->alamat }}</td>
                    <td>{{ $rsPengarang->email }}</td>
                    <td>{{ $rsPengarang->telp }}</td>
                    <td>
                    <a href="{{ url('pengarang/edit',$rsPengarang->kd_pengarang) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                    <a onclick="return Confirm_Delete(this)" link="/pengarang/delete/{{ $rsPengarang->kd_pengarang }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop