@extends('layouts.frontend')
@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__address">
                        <h5>Contact info</h5>
                        <ul>
                            <li>
                                <h6><i class="fa fa-map-marker"></i> Sha Clinic</h6>
                                <p>Jl. Prof. HMO Bafadhal No.18, Cemp. Putih, Kec. Jelutung, Kota Jambi, Jambi 36134</p>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone"></i> Phone</h6>
                                <p><span>0822-8181-9977</span><span>0822-8181-9977</span></p>
                            </li>
                            <li>
                                <h6><i class="fa fa-headphones"></i> Support</h6>
                                <p>Shaclinic.treatmen@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <div class="contact__form">
                        <h5>SEND MESSAGE</h5>
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Website">
                            <textarea placeholder="Message"></textarea>
                            <button type="submit" class="site-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__map" style="border-radius: 25px;">
                    <iframe
                        src="https://maps.google.com/maps?q=Sha Clinic Jl. Prof. HMO Bafadhal No.18, Cemp. Putih, Kec. Jelutung, Kota Jambi, Jambi 36134, Indonesia&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        height="780" style="border-radius: 25px; border:0;" allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection