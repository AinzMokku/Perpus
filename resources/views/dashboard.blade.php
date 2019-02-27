@extends('tamplate')

@section('judul')
Dashboard
@stop

@section('subjudul')
Selamat datang {{ Auth::user()->name }}
@stop

@section('content')

    <!-- BOX PALING ATASS -->
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $jbuku }}</h3>

              <p>Data Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{ $janggota }}</h3>

              <p>Data Anggota</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="anggota" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $jterpinjam }}</h3>

              <p>Transaksi Pengembalian</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="/trans/pengembalian" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              <p>Laporan Anggota</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="/report/anggota" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- TUTUP BOX -->




     <!-- /.box -->
        <div class="col-lg-6 col-xs-12">
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Keadaan Buku</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div  style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Buku Tersedia</span>
                    <small class="pull-right">{{ $jtersedia }}</small>
                  </div>
                  <div class="clearfix">
                    <span class="pull-left">Buku Terpinjam</span>
                    <small class="pull-right">{{ $jterpinjam }}</small>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Buku Hilang</span>
                    <small class="pull-right">{{ $jhilang }}</small>
                  </div>
                  <div class="clearfix">
                    <span class="pull-left">Buku Rusak</span>
                    <small class="pull-right">{{ $jrusak }}</small>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
        </div>

        <div class="col-lg-6 col-xs-12">
          <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="{{ asset('img/user1-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/user2-160x160.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/user3-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/user4-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="{{ asset('img/user1-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
            </div>
@stop
