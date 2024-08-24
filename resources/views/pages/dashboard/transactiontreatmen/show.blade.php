@extends('layouts.admin')
@section('admin-content')
<div class="content-body" id="area-to-print">
    <div class="container-fluid">
        <section>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
                integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-15">Invoice {{$bookingtreatman->kode}} <span
                                            class="badge bg-success font-size-12 ms-2">{{$bookingtreatman->status}}</span>
                                    </h4>
                                    <div class="mb-4">
                                        <h2 class="mb-1 text-muted">Shaklinik.com</h2>
                                    </div>
                                    <div class="text-muted">
                                        <p class="mb-1">{{$bookingtreatman->user->name}}</p>
                                        <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>
                                            {{$bookingtreatman->user->email}}
                                        </p>
                                        <p><i class="uil uil-phone me-1"></i> {{$bookingtreatman->no_hp}}</p>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-muted">
                                            <h5 class="font-size-16 mb-3">Billed To:</h5>
                                            <h5 class="font-size-15 mb-2">{{$bookingtreatman->user->name}}</h5>
                                            <p class="mb-1">{{$bookingtreatman->alamat}}</p>
                                            <p class="mb-1">{{$bookingtreatman->nama_pemesan}}</p>
                                            <p>{{$bookingtreatman->no_hp}}</p>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-sm-6">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                                <p>{{$bookingtreatman->kode}}</p>
                                            </div>
                                            <div>
                                                <h5 class="font-size-15 mb-1">Jam :</h5>
                                                <p>{{$bookingtreatman->jam_janji}}</p>
                                            </div>
                                            <div>
                                                <h5 class="font-size-15 mb-1">Tanggal Janji :</h5>
                                                <p>{{$bookingtreatman->tgl_janji}}</p>
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="font-size-15 mb-1">Order No:</h5>
                                                <p>#{{$bookingtreatman->id}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="py-2">
                                    <h5 class="font-size-15">Order Summary</h5>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-muted" style="width: 70px;">No.</th>
                                                    <th class="text-muted">Item</th>
                                                    <th class="text-muted">Price</th>
                                                    <th class="text-muted">Quantity</th>
                                                    <th class="text-muted" style="width: 120px;">Total</th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>
                                                @foreach ($transactionitem as $item)
                                                <tr>
                                                    <th class="text-muted" scope="row">01</th>
                                                    <td>
                                                        <div>
                                                            <h5 class="text-truncate font-size-14 mb-1">
                                                                {{$item->treatmen->nama_jasa}}
                                                            </h5>
                                                            <p class="text-muted mb-0">
                                                                {{$item->treatmen->bagian->nama_bagian}} /
                                                                {{$item->treatmen->jenis}}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted">Rp.{{number_format($item->treatmen->tarif)}}
                                                    </td>
                                                    <td class="text-muted">{{$item->quantity}}</td>
                                                    <td class="text-muted">Rp.
                                                        {{number_format($item->treatmen->tarif * $item->quantity)}}
                                                    </td>
                                                </tr>
                                                @endforeach

                                                <tr>
                                                    <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                    <td class="border-0 text-end">
                                                        <h4 class="m-0 fw-semibold">
                                                            Rp.{{number_format($bookingtreatman->total_price)}}</h4>
                                                    </td>
                                                </tr>
                                                <!-- end tr -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div><!-- end table responsive -->
                                    <div class="d-print-none mt-4">
                                        <div class="float-end">
                                            <a href="javascript:void(0);" class="btn btn-success me-1"
                                                onclick="printArea('area-to-print')"><i class="fa fa-print"></i>
                                                Cetak</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
            <script>
                function printArea(areaID) {
                    var printContent = document.getElementById(areaID).innerHTML;
                    var originalContent = document.body.innerHTML;
            
                    document.body.innerHTML = printContent;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>
        </section>
    </div>
</div>

@endsection