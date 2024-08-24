@extends('layouts.frontend')

@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="./blog.html">Check Invoice</a>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__form">
                            <h5>Check Kode Invoice</h5>
                            <form action="{{ route('checkinvoice') }}" method="get">
                                @csrf
                                <input type="text" placeholder="Masukkan kode Invoice" name="search_keyword">
                                <button type="submit" class="site-btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            @if ($result)
            <div class="col-lg-8 col-md-8">
                <div class="blog__details__content">
                    <div class="blog__details__item">
                        <img src="img/blog/details/blog-details.jpg" alt="" />
                        <div class="blog__details__item__title">
                            <span class="tip">{{$result->kode_inv}}</span>
                            <h4>
                                Berikut Detail Pesanan Anda
                            </h4>
                            <ul>
                                <li>Kode Invoice : <span>{{$result->kode_inv}}</span></li>
                                <li class="tip">{{$result->tgl}}</li>

                                <li class="tip">Status : {{$result->status}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="invoice-container">
                                            <div class="invoice-header">

                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <a href="{{route('index')}}" class="invoice-logo">
                                                            ShaKlinik
                                                        </a>
                                                    </div>

                                                </div>
                                                <!-- Row end -->
                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <address>
                                                                {{$result->user->name}}<br>
                                                                {{$result->address}}
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num">
                                                                <div> #{{$result->kode_inv}}</div>
                                                                <div>{{$result->tgl}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->
                                            </div>
                                            <div class="invoice-body">
                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="table-responsive">
                                                            <table class="table custom-table m-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Items</th>
                                                                        <th>Product ID</th>
                                                                        <th>Quantity</th>
                                                                        <th>Sub Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($items as $item)
                                                                    <tr>
                                                                        <td>
                                                                            {{$item->product->name}}
                                                                            <p class="m-0 text-muted">
                                                                                {{$item->product->category->name}}
                                                                            </p>
                                                                        </td>
                                                                        <td>#{{$item->product->id}}</td>
                                                                        <td>{{$item->quantity}}</td>
                                                                        <td>{{number_format($item->product->price * $item->quantity)}}
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->
                                            </div>
                                            <div class="invoice-footer">
                                                Terima Kasih Sudah Membeli Produk Dari Sha Aesthetic
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @else
            <div class="col-lg-12">
                <p>Tidak ada hasil pencarian.</p>
            </div>
            @endif
        </div>
    </div>



</section>

@endsection