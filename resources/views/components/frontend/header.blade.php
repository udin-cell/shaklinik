<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo text-muted ml-5">
                    <a href="{{route('index')}}"><img src="{{asset('../klinik/img/logosha-1.png')}}" alt=""
                            style="width:80px;"></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ \Route::current()->getName() == 'index' ? 'active' : '' }}"><a
                                href="{{route('index')}}">Home</a></li>
                        <li class="{{ \Route::current()->getName() == 'category' ? 'active' : '' }}"><a
                                href="{{route('category')}}">Produk</a></li>
                        <li class="{{ \Route::current()->getName() == 'categorytreatmen' ? 'active' : '' }}"><a
                                href="{{route('categorytreatmen')}}">Treatmen</a></li>

                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{route('bookingcart')}}">Booking Cart </a></li>
                                <li><a href="{{route('cart')}}">Cart</a></li>
                                <li><a href="{{route('checkoutdetail')}}">Checkout</a></li>
                                <li><a href="{{route('bookingdetail')}}">Booking Detail</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>

                            </ul>
                        </li>
                        <li class="{{ \Route::current()->getName() == 'checkjadwal' ? 'active' : '' }}"><a
                                href="{{route('checkjadwal')}}">Check Jadwal </a>
                        </li>
                        <li class="{{ \Route::current()->getName() == 'checkinvoice' ? 'active' : '' }}"><a
                                href="{{route('checkinvoice')}}">Check
                                Invoice </a>
                        </li>
                        <li class="{{ \Route::current()->getName() == 'category' ? 'active' : '' }}"><a
                                href="#testimoni">Testimoni</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    @guest
                    <div class="header__right__auth">
                        <a href="{{route('login')}}">Login</a>
                        <a href="{{route('register')}}">Register</a>
                    </div>
                    @endguest
                    @auth
                    <div class="header__right__auth">
                        <form action="{{route('logout')}}" method="post" class="header__right__auth">
                            @csrf
                            <button class="btn" type="submit">Logout</button>
                        </form>


                    </div>
                    @endauth

                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>

                        <li><a href="{{route('cart')}}"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a>
                        </li>
                        <li><a href="{{route('bookingcart')}}"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>