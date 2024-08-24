@extends('layouts.frontend')
@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
          <a href="{{route('category')}}">{{$product->category->name}} </a>
          <span>{{$product->name}}</span>
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
          <div class="product__details__pic__left product__thumb nice-scroll">
            @foreach ($product->galleries as $item)
            <a class="pt active" href="#product-{{$item->id}}">
              <img src="{{$item->url}}" alt="">
            </a>
            @endforeach

          </div>
          <div class="product__details__slider__content">
            <div class="product__details__pic__slider owl-carousel">
              @foreach ($product->galleries as $item)
              <img data-hash="product-{{$item->id}}" class="product__big__img" src="{{$item->url}}" alt="">
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="product__details__text">
          <h3>{{$product->name}} <span>Brand: SHA {{$product->name}}</span></h3>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <span>( 138 reviews )</span>
          </div>
          <div class="product__details__price">
            Rp.{{number_format($product->price)}}<span>Rp.{{number_format($product->price + 70000)}}</span></div>
          <p>{!! $product->description !!}</p>
          <form action="{{route('cart-add', $product->id)}}" method="post">
            @csrf
            <div class="product__details__button">
              <div class="quantity">
                <span>Quantity:</span>
                <div class="pro-qty">
                  <input name="quantity" type="text" value="1" readonly>
                </div>
              </div>
              <button type="submit" class="cart-btn border-0"><span class="icon_bag_alt"></span> Add to cart</button>
              <ul>
                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
              </ul>
            </div>
          </form>
          <div class="product__details__widget">
            <ul>
              <li>
                <span>Availability:</span>
                <div class="stock__checkbox">
                  <label for="stockin">
                    {{$product->stock}} In-Stock
                    <input type="checkbox" id="stockin">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </li>
              <li>
                <span>Promotions:</span>
                <p>Free shipping</p>
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
      @foreach ($recommendations as $recomend)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
          <div class="product__item__pic set-bg"
            data-setbg="{{ $recomend->galleries()->exists() ? url($recomend->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}">
            <div class="label new">New</div>
            <ul class="product__hover">
              <li><a
                  href="{{ $recomend->galleries()->exists() ? url($recomend->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                  class="image-popup"><span class="arrow_expand"></span></a></li>

              <li><a href="{{route('details', $recomend->slug)}}"><span class="icon_bag_alt"></span></a></li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6><a href="#">Buttons tweed blazer</a></h6>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <div class="product__price">$ 59.0</div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Product Details Section End -->

@endsection