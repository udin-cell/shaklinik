@extends('layouts.frontend')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping booking</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Treatment</th>
                                <th>Tarif</th>
                                <th>Jumlah Booking</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking as $booking)
                            <tr>
                                <td class="cart__product__item">
                                    <img src="{{$booking->treatmen->foto}}" alt=""
                                        style="border-radius: 15px; width: 70px;">
                                    <div class="cart__product__item__title">
                                        <h6>{{$booking->treatmen->nama_jasa}}</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">Rp.{{number_format($booking->treatmen->tarif)}}</td>



                                <td class="cart__quantity">
                                    <form action="{{route('booking-edit', $booking->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="pro-qty">
                                            <input type="text" value="{{$booking->quantity}}" name="quantity" readonly>
                                        </div>

                                </td>
                                <td class="cart__total">Rp.{{number_format($booking->total_harga)}}</td>
                                <td class="cart__close">
                                    <button type="submit" class="boreder-0 btn">
                                        <span class="icon_loading"></span>
                                    </button>
                                </td>
                                </form>

                                <form action="{{route('booking-delete', $booking->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <td class="cart__close">
                                        <button type="submit" class="boreder-0 btn">
                                            <span class="icon_close"></span>
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{route('category')}}">Continue Shopping</a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Total <span>Rp.{{number_format($booking->sum('total_harga'))}}</span></li>

                    </ul>
                    <a href="{{route('bookingdetail')}}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->

@endsection