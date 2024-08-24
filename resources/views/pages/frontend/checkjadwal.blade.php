@extends('layouts.frontend')

@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="./blog.html">Check Jadwal</a>
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
                            <h5>Check Kode JadwaL</h5>
                            <form action="{{ route('checkjadwal') }}" method="get">
                                @csrf
                                <input type="text" placeholder="Masukkan kode jadwal" name="search_keyword">
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
            @if ($results->count() > 0)
            @foreach ($results as $result)
            <div class="col-lg-8 col-md-8">
                <div class="blog__details__content">
                    <div class="blog__details__item">
                        <img src="img/blog/details/blog-details.jpg" alt="" />
                        <div class="blog__details__item__title">
                            <span class="tip">{{$result->kode_jadwal}}</span>
                            <h4>
                                Di Harapkan Pasien Datang 30 Menit Lebih Awal Setelah Jadwal Di Keluarkan.
                            </h4>
                            <ul>
                                <li>Kode Jadwal : <span>{{$result->kode_jadwal}}</span></li>
                                <li class="tip">{{$result->tgl}}</li>
                                <li>No Urut : A-{{$result->no_urut}} </li>
                                <li class="tip">Jam : {{$result->jam}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__details__desc">
                        <p>
                            Dokter : {{$result->dokter->nama_dokter}}

                        </p>
                        <p>
                            Nama Pasien : {{$result->user->name}}
                        </p>
                        <p>
                            Jenis Treatmen : {{$result->treatmen->nama_jasa}}
                        </p>
                        <p>
                            Jenis Tindakan : {{$result->treatmen->jenis}}
                        </p>
                        <p>
                            Jenis Bagian : {{$result->treatmen->bagian->first()->nama_bagian}}
                        </p>
                        <p>
                            Jumlah Pasien : {{$result->jumlah}} orang
                        </p>
                    </div>
                    <div class="blog__details__quote">
                        <div class="icon">
                            <i class="fa fa-quote-left"></i>
                        </div>
                        <p>
                            1. "Mohon maaf, perhatian kepada semua pelanggan. Keterlambatan kedatangan melebihi batas
                            waktu
                            yang telah ditentukan akan
                            menyebabkan antrian hangus. Harap datang tepat waktu untuk menghindari hal ini. Terima kasih
                            atas pengertian dan
                            kerjasamanya."

                        </p>
                        <br>
                        <p>
                            2. "Kepada semua tamu yang telah mengantri, kami ingatkan bahwa antrian akan hangus jika
                            kedatangan melebihi batas waktu
                            yang telah ditentukan. Jadi, pastikan untuk hadir sesuai dengan jadwal agar kami dapat
                            memberikan pelayanan yang lebih
                            baik. Terima kasih."

                        </p>
                        <br>
                        <p>
                            3. "Antrian akan hangus untuk pelanggan yang tidak hadir pada waktunya. Harap dipahami bahwa
                            kami menghargai waktu setiap
                            orang. Jadi, silakan pastikan untuk hadir pada waktu yang telah ditentukan. Terima kasih."


                        </p>
                        <br>
                        <p>
                            4. "Penting untuk diingat bahwa antrian akan dibatalkan jika kedatangan melebihi batas waktu
                            yang ditentukan. Kami berharap
                            semua pelanggan dapat menghargai waktu masing-masing dan hadir sesuai jadwal yang telah
                            diatur. Terima kasih atas
                            perhatiannya."


                        </p>
                        <br>
                        <p>
                            5. "Kami ingin mengingatkan kepada semua pengunjung bahwa keterlambatan melebihi batas waktu
                            antrian akan menyebabkan
                            pembatalan antrian. Untuk menghindari kekecewaan, harap datang tepat waktu. Terima kasih
                            atas kerjasamanya."


                        </p>
                        <br>
                        <p>
                            6. Pastikan pesan yang Anda sampaikan jelas, ramah, dan sopan agar pengunjung memahami
                            pentingnya kedatangan tepat waktu
                            dan menghormati aturan antrian yang telah ditetapkan.
                        </p>
                    </div>

                </div>
            </div>
            @endforeach
            @else
            <p>Tidak ada hasil pencarian.</p>
            @endif
        </div>
    </div>



</section>

@endsection