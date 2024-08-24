@extends('layouts.frontend')

@section('content')
<!-- Categories Section Begin -->
<section class="categories">
  <div class="container-fluid" style="rounded-lg">
    <div class="row">
      <div class="col-lg-6 p-0" style="rounded-lg">
        <div class="categories__item categories__large__item set-bg" style="border-radius: 25px;"
          data-setbg="{{asset('../klinik/img/categories/category1.png')}}" style="">
          <div class="categories__text">
            <h1>Treatmen Terbaik</h1>
            <p>Inovasi medis, terapi alami dan nutrisi sehat untuk hidup lebih lama dan lebih baik</p>
            <a href="{{route('categorytreatmen')}}">Lihat Treatmen Sekarang</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
            <div class="categories__item set-bg" data-setbg="{{asset('../klinik/img/categories/category2.png')}}"
              style="border-radius: 25px;">
              <div class="categories__text">
                <h4>Produk Skincare</h4>
                <p></p>
                <a href="{{route('category')}}">Lihat Sekarang</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
            <div class="categories__item set-bg" data-setbg="{{asset('../klinik/img/categories/category3.png')}}"
              style="border-radius: 25px;">
              <div class="categories__text">
                <h4></h4>
                <p></p>
                <a href="{{route('categorytreatmen')}}"></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
            <div class="categories__item set-bg" data-setbg="{{asset('../klinik/img/categories/category-4.jpg')}}"
              style="border-radius: 25px;">
              <div class="categories__text">
                <h4>Produk Cosmetics</h4>
                <p></p>
                <a href="{{route('category')}}">Lihat Sekarang</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
            <div class="categories__item set-bg" data-setbg="{{asset('../klinik/img/categories/category-5.jpg')}}"
              style="border-radius: 25px;">
              <div class="categories__text">
                <h4></h4>
                <p></p>
                <a href="{{route('categorytreatmen')}}"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="section-title">
          <h4>Produk Dan Treatmen</h4>
        </div>
      </div>
      <div class="col-lg-8 col-md-8">
        <ul class="filter__controls">
          <li class="active" data-filter="*">All</li>
          @foreach ($categoryproducts as $category)
          <li data-filter=".{{$category->name}}">{{$category->name}}</li>
          @endforeach
          @foreach ($categorytreatments as $treatmencategory)
          <li data-filter=".{{$treatmencategory->nama_bagian}}">{{$treatmencategory->nama_bagian}}</li>
          @endforeach



        </ul>
      </div>
    </div>
    <div class="row property__gallery">
      @foreach ($products as $itemproduct)
      <div class="col-lg-3 col-md-4 col-sm-6 mix {{$itemproduct->category->name}}">
        <div class="product__item">
          <div class="product__item__pic set-bg"
            data-setbg="{{ $itemproduct->galleries()->exists() ? url($itemproduct->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
            style="border-radius: 25px;">
            <div class="label new">New</div>
            <ul class="product__hover">
              <li><a
                  href="{{ $itemproduct->galleries()->exists() ? url($itemproduct->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                  class="image-popup"><span class="arrow_expand"></span></a>
              </li>

              <li><a href="{{route('details', $itemproduct->slug)}}"><span class="icon_bag_alt"></span></a></li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6><a href="#">{{$itemproduct->name}}</a></h6>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <div class="product__price">Rp.{{number_format($itemproduct->price)}}</div>
          </div>
        </div>
      </div>
      @endforeach
      @foreach ($treatments as $itemtreatmen)
      <div class="col-lg-3 col-md-4 col-sm-6 mix {{$itemtreatmen->bagian->nama_bagian}}">
        <div class="product__item">
          <div class="product__item__pic set-bg"
            data-setbg="{{ asset( $itemtreatmen->foto ? : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' ) }}"
            style="border-radius: 25px;">
            <ul class="product__hover">
              <li><a
                  href="{{ asset( $itemtreatmen->foto ? : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==') }}"
                  class="image-popup"><span class="arrow_expand"></span></a>
              </li>

              <li><a href="{{route('treatmendetails', $itemtreatmen->id)}}"><span class="icon_bag_alt"></span></a></li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6><a href="#">{{$itemtreatmen->nama_jasa}}</a></h6>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <div class="product__price">Rp.{{number_format($itemtreatmen->tarif)}}</div>
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="{{asset('../klinik/img/banner/banner-1.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-xl-7 col-lg-8 m-auto">
        <div class="banner__slider owl-carousel">
          <div class="banner__item">
            <div class="banner__text">
              <span>Sha Klinik</span>
              <h1>The Project</h1>
              <a href="">Lihat Treatmen Sekarang</a>
            </div>
          </div>
          <div class="banner__item">
            <div class="banner__text">
              <span>Sha Klinik</span>
              <h1>The Project</h1>
              <a href="#">Shop now</a>
            </div>
          </div>
          <div class="banner__item">
            <div class="banner__text">
              <span>Sha Klinik</span>
              <h1>The Project</h1>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->

<!-- Discount Section End -->

<!-- Services Section Begin -->

<!-- Services Section End -->


<!-- Instagram End -->
@endsection