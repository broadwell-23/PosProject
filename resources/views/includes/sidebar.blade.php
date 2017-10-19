<!-- sidebar panel -->
<div class="sidebar-panel offscreen-left">

  <div class="brand">

    <!-- logo -->
    <div class="brand-logo">
      <span style="color: white;"><strong>ADMIN PANEL</strong></span>
    </div>
    <!-- /logo -->

    <!-- toggle small sidebar menu -->
    <a href="javascript:;" class="toggle-sidebar hidden-xs hamburger-icon v3" data-toggle="layout-small-menu">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </a>
    <!-- /toggle small sidebar menu -->

  </div>

  <!-- main navigation -->
  <nav role="navigation">

    <ul class="nav">

      <!-- dashboard -->
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard">
          <i class="fa fa-bar-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- /dashboard -->

      <!-- admin -->
      <li class="{{ Request::is('administrator') ? 'active' : '' }}">
        <a href="/administrator">
          <i class="fa fa-user"></i>
          <span>Admin</span>
        </a>
      </li>
      <!-- /admin -->

      <!-- barang -->
      <li class="{{ (Request::is('barang')||Request::is('packing')||Request::is('dokumen')||Request::is('aturan')||Request::is('tag')||Request::is('barang/tambah')) ? 'active open' : '' }}">
        <a href="javascript:;">
          <i class="fa fa-briefcase"></i>
          <span>Informasi Barang</span>
        </a>
        <ul class="sub-menu">
          <li class="{{ (Request::is('barang')||Request::is('barang/tambah')) ? 'active' : '' }}">
            <a href="/barang">
              <span>Daftar Barang</span>
            </a>
          </li>
          <li class="{{ (Request::is('packing')||Request::is('dokumen')||Request::is('aturan')||Request::is('tag')) ? 'active open' : '' }}">
            <a href="/barang">
              <span>Detail Barang</span>
            </a>
            <ul class="sub-menu">
              <li class="{{ Request::is('packing') ? 'active' : '' }}">
                <a href="/packing">
                  <span><i>Packing</i></span>
                </a>
              </li>
              <li class="{{ Request::is('dokumen') ? 'active' : '' }}">
                <a href="/dokumen">
                  <span>Dokumen Pendukung</span>
                </a>
              </li>
              <li class="{{ Request::is('aturan') ? 'active' : '' }}">
                <a href="/aturan">
                  <span>Aturan</span>
                </a>
              </li>
              <li class="{{ Request::is('tag') ? 'active' : '' }}">
                <a href="/tag">
                  <span><i>Tags</i></span>
                </a>
              </li>
            </ul>
          </li> 
        </ul>
      </li>
      <!-- /barang -->

      <!-- mitra -->
      <li class="{{ Request::is('mitra') ? 'active' : '' }}">
        <a href="/mitra">
          <i class="fa fa-institution"></i>
          <span>Mitra</span>
        </a>
      </li>
      <!-- /mitra -->

      <!-- pesan -->
      <li class="{{ Request::is('pesan') ? 'active' : '' }}">
        <a href="/pesan">
          <i class="fa fa-comment"></i>
          <span>Pesan Masuk</span>
          <span class="label label-danger pull-right">
            {{ App\Pesan::where('status', 1)->count() }}
          </span>
        </a>
      </li>
      <!-- /pesan -->

    </ul>
  </nav>
  <!-- /main navigation -->

</div>
<!-- /sidebar panel -->