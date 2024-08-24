@extends('layouts.frontend')
@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{route('categorytreatmen')}}">{{$treatment->bagian->nama_bagian}}</a>
                    <span>{{$treatment->nama_jasa}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">

                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="{{$treatment->foto}}" alt="">


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{$treatment->nama_jasa}} <span>Bagian: {{$treatment->bagian->nama_bagian}} </span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 reviews )</span>
                    </div>
                    <div class="product__details__price">Rp.{{number_format($treatment->tarif)}}
                        <span>Rp.{{number_format($treatment->tarif + 70000)}}</span>
                    </div>
                    <p>{!!$treatment->deskripsi!!}</p>
                    <form action="{{route('booking-add', $treatment->id)}}" method="post">
                        @csrf
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Jumlah Pasien:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1" name="quantity">
                                </div>
                            </div>
                            <button type="submit" class="cart-btn border-0"><span class="icon_bag_alt"></span> Add To
                                Booking</button>
                            <ul>
                                <li></li>

                                <li>
                                    <a style="background-color: rgb(22, 209, 22);" class=""
                                        href="https://api.whatsapp.com/send?phone=6281369649668&text=Halo%20!!%20saya%20ingin%20bertanya%20mengenai%20treatmen.%20Bisakah%20Anda%20membantu%20saya%20dengan%20beberapa%20pertanyaan%20yang%20ingin%20saya%20tanyakan?%20Tentang%20Treatmen%20:%20*{{$treatment->nama_jasa}}*"><span
                                            class="fa fa-whatsapp">
                                        </span>
                                    </a>
                                    Tanya Treatmen Ini
                                </li>

                            </ul>
                        </div>
                    </form>

                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    <label for="stockin">
                                        Buka dari 09:00 - Jam 21:00
                                        <input type="checkbox" id="stockin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>


                            <li>
                                <span>Promotions:</span>
                                <p>Free Consume</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Specification</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Reviews ( 2 )</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>RELATED PRODUCTS</h5>
                </div>
            </div>
            @foreach ($recommendations as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{$item->foto}}">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="{{$item->foto}}" class="image-popup"><span class="arrow_expand"></span></a>
                            </li>

                            <li><a href="{{route('treatmendetails', $item->id)}}"><span class="icon_bag_alt"></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$item->nama_jasa}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">{{number_format($item->tarif)}}</div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- Product Details Section End -->

@endsection