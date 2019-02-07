@extends('tamplate')

@section('judul')
Form Penerbit
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

<form id="frmPenerbit" class="form-horizontal" action="{{ url('penerbit/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFoto col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Foto</h3>
                </div>
                <div class="box-body">
                    @if($penerbit['foto'])
                        <img id="avatar" src="{{ asset('img/'.$penerbit['foto']) }}" style="width:100%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" src="{{ asset('img/no-image.png') }}" style="width:100%;border: 2px solid #ccc;">
                    @endif
                    <input id="file" type="file" name="foto" style="display: none">
                    <input type="hidden" name="old_foto" value="{{ $penerbit['foto'] }}">
                </div>
            </div>
        </div>
        <div class="fForm col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Penerbit</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama Penerbit</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_penerbit" value="{{ $penerbit['kd_penerbit'] }}">
                            <input type="text" class="form-control" id="nama" placeholder="Nama penerbit" name="nama_penerbit" value="{{ $penerbit['nama_penerbit'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat">{{ $penerbit['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kota" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="kota" placeholder="Kota" name="kota" value="{{ $penerbit['kota'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $penerbit['email'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" id="telp" placeholder="Telepon" name="telp" value="{{ $penerbit['telp'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop