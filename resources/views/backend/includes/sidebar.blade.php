    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-box"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Transfer Stock</div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-desktop"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      @if (auth()->user()->posisi == 'Admin')

      <!-- Heading -->
      <div class="sidebar-heading">
        Master
      </div>

      <li class="nav-item {{ (request()->segment(3) == 'karyawan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('master.karyawan.index') }}">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Karyawan </span></a>
      </li>
      <li class="nav-item {{ (request()->segment(3) == 'store') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('master.store.index') }}">
          <i class="fas fa-fw fa-store"></i>
          <span>Toko / Store </span></a>
      </li>
      <li class="nav-item {{ (request()->segment(3) == 'kategori') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('master.kategori.index') }}">
          <i class="fas fa-fw fa-user-secret"></i>
          <span>Kategori </span></a>
      </li>
      <li class="nav-item {{ (request()->segment(3) == 'barang') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('master.barang.index') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Barang </span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaction
      </div>
      <li class="nav-item {{ (request()->segment(3) == 'stock-in') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('trx.stock-in.index') }}">
          <i class="fas fa-fw fa-sign-in-alt"></i>
          <span>Stock Barang Masuk</span></a>
      </li>
      <li class="nav-item {{ (request()->segment(3) == 'transfer-barang') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('trx.transfer-barang.index') }}">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Stock Transfer Keluar</span></a>
      </li>
      <li class="nav-item {{ (request()->segment(3) == 'stockdata') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('master.stockdata.index') }}">
          <i class="fas fa-fw fa-circle"></i>
          <span>Stock Antar Toko</span></a>
      </li>
      @endif


      @if (auth()->user()->posisi == 'Karyawan')

      <!-- Heading -->
      <div class="sidebar-heading">
        Master
      </div>

      <li class="nav-item {{ (request()->segment(3) == 'barang') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('master.barang.index') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Barang </span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaction
      </div>
      <li class="nav-item {{ (request()->segment(3) == 'stock-in') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('trx.stock-in.index') }}">
          <i class="fas fa-fw fa-sign-in-alt"></i>
          <span>Stock Barang Masuk</span></a>
      </li>
      <li class="nav-item {{ (request()->segment(3) == 'transfer-barang') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('trx.transfer-barang.index') }}">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Stock Transfer Keluar</span></a>
      </li>
      @endif


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    @push('after-script')
    <script>
      $(document).ready(function () {

        $('.wrap-menu').each(function(idx,item) {

          var active_menu = $(item).find('.active');
          if (active_menu.length > 0) {
            $(item).find('.collapse').addClass('show');
          }
          console.log(active_menu);
        });


      });

    </script>
    @endpush
