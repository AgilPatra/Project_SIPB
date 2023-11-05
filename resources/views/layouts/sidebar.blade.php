 <!-- Sidebar -->
 <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" 
 style="background-color: #709fb0 ">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-warehouse"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIP Amarta</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>

<!-- Nav Item - Pages Collapse Menu -->
@if (Auth::user()->role != 1 && Auth::user()->role != 2)
@else
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Master</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu Master :</h6>
            @if (Auth::user()->role != 2)
             @else
            <a class="collapse-item" href="/barang">Barang</a>
            @endif
            @if (Auth::user()->role != 1)
            @else
            <a class="collapse-item" href="/user">Data User</a>
            @endif
        </div>
    </div>
</li>
@endif

<!-- Nav Item - Utilities Collapse Menu -->
@if (Auth::user()->role != 2) 
@else
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi"
        aria-expanded="true" aria-controls="collapseTransaksi">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Transaksi</span>
    </a>
    <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu Transaksi :</h6>
            <a class="collapse-item" href="/barangmasuk">Barang Masuk</a>
            <a class="collapse-item" href="/barangkeluar">Barang Keluar</a>
            
        </div>
    </div>
</li>
@endif

@if (Auth::user()->role != 1 && Auth::user()->role != 2 && Auth::user()->role != 3 && Auth::user()->role != 4)
@else
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermintaan"
        aria-expanded="true" aria-controls="collapsePermintaan">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Permintaan</span>
    </a>
    <div id="collapsePermintaan" class="collapse" aria-labelledby="headingPermintaan"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu Permintaan :</h6>
            @if (Auth::user()->role != 1 && Auth::user()->role != 2 && Auth::user()->role != 3 )
            @else
            <a class="collapse-item" href="/permintaanbarang">Permintaan Barang</a>
            @endif
            {{-- @if (Auth::user()->role != 2 && Auth::user()->role != 3 && Auth::user()->role != 4 )
            @else
            <a class="collapse-item" href="/permintaanproduksi">Permintaan Produksi</a>
            @endif --}}
        </div>
    </div>
</li>
@endif
   <!-- Nav Item - Utilities Collapse Menu -->
   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class=" fas fa-fw fa-book"></i>
        <span>Laporan</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Submenu Laporan :</h6>
            {{-- <a class="collapse-item" href="laporanpersediaan">Persediaan Barang</a> --}}
            <a class="collapse-item" href="/laporanbarang">Barang</a>
            <a class="collapse-item" href="/laporanbarangmasuk">Barang Masuk</a>
            <a class="collapse-item" href="/laporanbarangkeluar">Barang Keluar</a>
            <a class="collapse-item" href="/laporanpermintaanbarang">Permintaan Barang</a>
            {{-- <a class="collapse-item" href="/laporanpermintaanproduksi">Permintaan Produksi</a> --}}
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->


<!-- Sidebar Message -->
<div class="sidebar-card d-none d-lg-flex my-2">
    <img class="sidebar-card-illustration mb-2" 
    src="{{asset('assets')}}/img/WhatsApp Image 2022-12-12 at 20.43.20 (1).jpeg" alt="...">
    <p class="text-center mb-2"><strong>CV AMARTA FURNITURE</strong></p>
    <p class="text-center mb-2">Sistem Informasi Persediaan Barang</p>
</div>

</ul>
<!-- End of Sidebar -->