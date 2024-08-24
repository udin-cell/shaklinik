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
<section id="#testimoni" class="banner set-bg" data-setbg="{{asset('../klinik/img/banner/banner-1.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 m-auto">
        <div class="banner__slider owl-carousel">
          @foreach ($testimonis as $testimoni)
          <div class="banner__item">
            <div class="banner__text">
              <span>Sha Klinik</span>
              <h1>The Testimoni</h1>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimoniModal">
                Post Testi Moni Kamu
              </button>
            </div>
            <!-- Foto Before dan After -->
            <div class="banner__images d-flex justify-content-between">
              <div class="text-center" style="width: 50%;">
                <img
                  src="{{ $testimoni->foto_before ? url($testimoni->foto_before) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                  alt="Foto Before" class="img-fluid"
                  style="width: 500px; height: 500px; object-fit: contain; border-radius: 15px;">
                <p style="margin-top: 10px;">Before</p>
              </div>
              <div class="text-center" style="width: 50%;">
                <img
                  src="{{ $testimoni->foto_after ? url($testimoni->foto_after) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                  alt="Foto After" class="img-fluid"
                  style="width: 500px; height: 500px; object-fit: contain; border-radius: 15px;">
                <p style="margin-top: 10px;">After</p>
              </div>
            </div>
            <!-- Hasil Testimoni -->
            <div class="testimoni-bubble"
              style="margin-top: 20px; text-align: center; position: relative; max-width: 1000px; margin-left: auto; margin-right: auto;">
              <p
                style="background: #f0f0f0; padding: 15px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                "Hai Perkenalkan Aku "{{$testimoni->user->name}}", Terimakasih Banget ShaaKlinik Dengan Menggunakan
                Produk
                "{{$testimoni->product->name}}" dan Treatmen
                "{{$testimoni->treatmen->nama_jasa}}".
                <br>
                {{$testimoni->testimoni_text}}
                "
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>


      {{-- --}}

    </div>
  </div>
</section>

<!-- Modal Form -->
<div class="modal fade" id="testimoniModal" tabindex="-1" aria-labelledby="testimoniModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testimoniModalLabel">Post Your Testimoni</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @auth
          <div class="mb-3">
            <input hidden class="form-control" id="users_id" name="users_id" value="{{ Auth::user()->id }}" required>
          </div>
          @endauth
          <div class="mb-3">
            <label for="product_id" class="form-label">Produk Yang Di Pakai</label>
            <select class="form-control" name="product_id" id="">
              @foreach ($products as $product)
              <option value="{{$product->id}}">{{$product->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="product_id" class="form-label">Treatmen Yang Di lakukan</label>
            <select class="form-control" name="treatmen_id" id="">
              @foreach ($treatments as $treatmen)
              <option value="{{$treatmen->id}}">{{$treatmen->nama_jasa}}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="foto_before" class="form-label">Foto Before</label>
            <input type="file" class="form-control" id="foto_before" name="foto_before" accept="image/*" required>
          </div>
          <div class="mb-3">
            <label for="foto_after" class="form-label">Foto After</label>
            <input type="file" class="form-control" id="foto_after" name="foto_after" accept="image/*" required>
          </div>
          <div class="mb-3">
            <label for="testimoni_text" class="form-label">Testimoni Text</label>
            <textarea class="form-control" id="testimoni_text" name="testimoni_text" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection