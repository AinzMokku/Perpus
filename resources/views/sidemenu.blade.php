<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="@yield('ac-dash')"><a href="{{ url('/dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
    <li class="treeview @yield('ac-buku')">
      <a href="#"><i class="fa fa-users"></i> <span>Anggota</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/anggota') }}">Data Anggota</a></li>
        <li><a href="{{ url('/anggota/add') }}">New Data</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-anggota')">
      <a href="#"><i class="fa fa-book"></i> <span>Buku</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/buku') }}">Data Buku</a></li>
        <li><a href="{{ url('/buku/add') }}">New Data</a></li>
        <li><a href="{{ url('report/qrcode_buku') }}" target="blank">QR Code Buku</a></li>
        <li><a href="{{ url('/koleksi') }}">Data Koleksi Buku</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-pengarang')">
      <a href="#"><i class="fa fa-pencil-square-o"></i> <span>Pengarang</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/pengarang') }}">Data Pengarang</a></li>
        <li><a href="{{ url('/pengarang/add') }}">New Data</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-penerbit')">
      <a href="#"><i class="fa fa-industry"></i> <span>Penerbit</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/penerbit') }}">Data Penerbit</a></li>
        <li><a href="{{ url('/penerbit/add') }}">New Data</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-rak')">
      <a href="#"><i class="fa fa-archive"></i> <span>Rak</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/rak') }}">Data Rak</a></li>
        <li><a href="{{ url('/rak/add') }}">New Data</a></li>
      </ul>
    </li>
    <li class="treeview @yield('ac-kategori')">
      <a href="#"><i class="fa fa-folder"></i> <span>Kategori</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/kategori') }}">Data Kategori</a></li>
        <li><a href="{{ url('/kategori/add') }}">New Data</a></li>
      </ul>
    </li> <li class="treeview @yield('ac-transaksi')">
      <a href="#"><i class="fa fa-shopping-cart"></i><span>Transaksi</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('trans/peminjaman') }}">Peminjaman</a></li>
        <li><a href="{{ url('trans/pengembalian') }}">Pengembalian</a></li>
      </ul>
    </li><li class="treeview @yield('ac-laporan')">
      <a href="#"><i class="fa fa-book"></i> <span>Laporan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('report/anggota') }}" target="blank">Laporan Anggota</a></li>
        <li><a href="{{ url('trans/pengembalian') }}">Pengembalian</a></li>
      </ul>
    </li> 
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>