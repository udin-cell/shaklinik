@extends('layouts.frontend')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{route('categorytreatmen')}}">Shop</a>
                    <span>Treatmen </span>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading active">
                                        <a data-toggle="collapse" data-target="#collapseOne">Kategori</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                @foreach ($category as $category)
                                                <li><a href="#">{{$category->nama_bagian}}</a></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    @foreach ($treatmen as $t)
                    <div class="col-lg-4 col-md-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{$t->foto}}"
                                style="border-radius: 25px;">
                                <div class="label new" style="border-radius: 25px;">New</div>
                                <ul class="product__hover">
                                    <li><a href="" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><a href="{{route('treatmendetails' , $t->id)}}"><span
                                                class="icon_heart_alt"></span></a></li>
                                    <li><a href="{{route('treatmendetails' , $t->id)}}"><span
                                                class="icon_bag_alt"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{$t->nama_jasa}}</a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">Rp {{number_format($t->tarif)}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-12 text-center">
                        <div class="pagination__option">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
@endsection