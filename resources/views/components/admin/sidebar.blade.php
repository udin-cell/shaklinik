<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Apps</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('dashboard.index')}}"><i class="icon icon-app-store"></i>Dashboard </a></li>
                    <li><a href="{{route('dashboard.daftartunggu.index')}}"><i class="icon icon-app-store"></i>Daftar
                            Tunggu
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-label">MASTER</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Data - Master</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('dashboard.product.index')}}"><i class="icon icon-app-store"></i>Produk
                            Kecantikan</a>
                    </li>
                    <li><a href="{{route('dashboard.category.index')}}"><i class="icon icon-app-store"></i>Kateogori
                            Produk</a></li>
                    <li><a href="{{route('dashboard.treatmen.index')}}"><i class="icon icon-app-store"></i>Treatmen</a>
                    </li>
                    <li><a href="{{route('dashboard.categorytreatmen.index')}}"><i class="icon icon-app-store">
                            </i>Kategori Treatmen</a>
                    </li>
                    <li><a href="{{route('dashboard.user.index')}}"><i class="icon icon-app-store"></i>Pasien</a>
                    </li>
                    <li><a href="{{route('dashboard.dokter.index')}}"><i class="icon icon-app-store"></i>Dokter</a>
                    </li>

                </ul>
            </li>
            <li class="nav-label">PESANAN</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon icon-app-store"></i><span class="nav-text">Data - Pesanan</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('dashboard.transaction.index')}}"><i class="icon icon-app-store"></i>Daftar
                            Pesanan Produk</a>
                    <li><a href="{{route('dashboard.bookingtreatmen.index')}}"><i class="icon icon-app-store"></i>Daftar
                            Pesanan
                            Treatmen</a></li>
            </li>



        </ul>
        </li>

        <li class="nav-label">LAPORAN </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span
                    class="nav-text">Data - Laporan</span></a>
            <ul aria-expanded="false">
                <li><a href="{{route('dashboard.laporan-t')}}"><i class="icon icon-app-store"></i> Transaksi Produk</a>
                </li>
                <li><a href="{{route('dashboard.laporan-tx')}}"><i class="icon icon-app-store"></i> Transaksi Treatment
                        /
                        Tindakan</a></li>



            </ul>
        </li>

        </ul>
    </div>


</div>