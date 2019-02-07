@extends('tamplate')

@section('judul')
Data Kategori
@stop

@section('ac-kategori')
active
@stop


@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{ url('kategori/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Singkatan</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($kategori as $rsKat)
                <tr>
                    <td>{{ $rsKat->kd_kategori }}</td>
                    <td>{{ $rsKat->nama_kategori }}</td>
                    <td>{{ $rsKat->singkatan }}</td>
                    <td>
                    <a href="{{ url('kategori/edit',$rsKat->kd_kategori) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                    <a onclick="return Confirm_Delete(this)" link="/kategori/delete/{{ $rsKat->kd_kategori }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop