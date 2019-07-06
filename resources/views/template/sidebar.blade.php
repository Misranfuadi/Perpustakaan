{{-- liftside --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
        <img src="lte/dist/img/TosranLogo.png" alt="ToSranLogo" class="brand-image img-circle elevation-3"
            style="opacity: 1">
        <img class="brand-text elevation-3" src="lte/dist/img/TosranText.png" >
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                @if (!empty($halaman)&& $halaman == 'home')
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link active">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Home</p>
                    </a>
                @else
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                @endif
                @if (!empty($menu)&& $menu == 'master')
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                @else
                <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                @endif
                        <i class="nav-icon fa fa-database"></i>
                        <p>Master<i class="right fa fa-arrow-circle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (!empty($halaman)&& $halaman == 'kelas')
                        <li class="nav-item">
                            <a href="{{ url('kelas') }}" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ url('kelas') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-briefcase"></i>
                        <p>Transaksi<i class="right fa fa-arrow-circle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pengembalian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Laporan<i class="right fa fa-arrow-circle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Denda</p>
                            </a>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pengembalian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Kalender</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
{{-- /liftside --}}

<!-- rightside -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.rightside -->
