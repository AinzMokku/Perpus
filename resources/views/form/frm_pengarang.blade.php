@extends('tamplate')

@section('judul')
Form Pengarang
@stop

@section('content')

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</em>
</div>
@endif

<form id="frmPengarang" class="form-horizontal" action="{{ url('pengarang/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFoto col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Foto</h3>
                </div>
                <div class="box-body">
                    @if($pengarang['foto'])
                        <img id="avatar" src="{{ asset('img/'.$pengarang['foto']) }}" style="width:100%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" src="{{ asset('img/no-image.png') }}" style="width:100%;border: 2px solid #ccc;">
                    @endif
                    <input id="file" type="file" name="foto" style="display: none">
                    <input type="hidden" name="old_foto" value="{{ $pengarang['foto'] }}">
                </div>
            </div>
        </div>
        <div class="fForm col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Pengarang</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama Pengarang</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_pengarang" value="{{ $pengarang['kd_pengarang'] }}">
                            <input type="text" class="form-control" id="nama" placeholder="Nama Pengarang" name="nama_pengarang" value="{{ $pengarang['nama_pengarang'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat">{{ $pengarang['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $pengarang['email'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" id="telp" placeholder="Telepon" name="telp" value="{{ $pengarang['telp'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button onclick="return Confirm_Save(this)"  type="submit" class="btn btn-primary pull-right">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop