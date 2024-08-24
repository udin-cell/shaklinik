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
                            <form class="form" action="{{route('dashboard.product.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-username">Nama
                                                Produk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="name"
                                                    placeholder="Masukan Nama Produk">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted"
                                                for="val-suggestions">Deskripsi
                                                Produk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control " id="val-suggestions" name="description"
                                                    rows="5" placeholder="Isi Deskripsi Produk"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-skill">Pilih
                                                Kategori Produk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="categories_id">
                                                    <option value="">Please select</option>
                                                    @foreach ($category as $category)

                                                    <option value="{{$category->id}}">
                                                        {{$category->kode}},{{$category->name}}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-currency">Harga
                                                Produk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="price" name="price"
                                                    placeholder="Rp.21.60">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-digits">Stock
                                                Produk <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="stock" name="stock"
                                                    placeholder="5">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Simpan Produk
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
    CKEDITOR.replace('description');
</script>
@endsection