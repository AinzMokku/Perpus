@extends('tamplate')

@section('judul')
Data penerbit
@stop

@section('ac-penerbit')
active
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{ url('penerbit/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>penerbit</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Kota</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($penerbit as $rsPenerbit)
                <tr>
                    <td>{{ $rsPenerbit->kd_penerbit }}</td>
                    <td>{{ $rsPenerbit->nama_penerbit }}</td>
                    <td>{{ $rsPenerbit->alamat }}</td>
                    <td>{{ $rsPenerbit->telp }}</td>
                    <td>{{ $rsPenerbit->kota }}</td>
                    <td>{{ $rsPenerbit->email }}</td>
                    <td>
                    <a href="{{ url('penerbit/edit',$rsPenerbit->kd_penerbit) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                    <a onclick="return Confirm_Delete(this)" link="/penerbit/delete/{{ $rsPenerbit->kd_penerbit }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop