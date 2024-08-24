@extends('layouts.admin')
@section('admin-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-1">Validation</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Validation</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Buat Produk Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form">
                            <form class="form" action="{{route('dashboard.treatmen.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-username">Nama
                                                Jasa Treatmen
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username"
                                                    name="nama_jasa" placeholder="Masukan Nama Jasa">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted"
                                                for="val-suggestions">Deskripsi Jasa
                                                Produk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control " id="val-suggestions" name="deskripsi"
                                                    rows="5" placeholder="Isi Deskripsi Jasa"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-skill">Pilih
                                                Kategori Jasa / Treatmen Produk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="bagians_id">
                                                    <option value="">Please select</option>
                                                    @foreach ($category as $category)

                                                    <option value="{{$category->id}}">
                                                        {{$category->kode}}, {{$category->nama_bagian}}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-skill">Pilih
                                                Jenis Jasa / Tindakan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="jenis">
                                                    <option value="">Please select</option>

                                                    <option value="OTHERS">OTHERS</option>
                                                    <option value="JASA">JASA</option>
                                                    <option value="TINDAKAN">TINDAKAN</option>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-currency">Harga
                                                Tarif Jasa
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price" name="tarif"
                                                    placeholder="Rp.21.60">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-digits">Foto Jasa
                                                Produk <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="foto" name="foto"
                                                    placeholder="">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Simpan Jasa
                                                    Baru</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>
@endsection