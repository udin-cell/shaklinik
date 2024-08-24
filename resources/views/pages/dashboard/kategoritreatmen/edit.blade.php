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
                            <form class="form" action="{{route('dashboard.categorytreatmen.update', $item->id)}}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-username">Nama
                                                Kategori Produk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username"
                                                    name="nama_bagian" value="{{$item->nama_bagian}}"
                                                    placeholder="Masukan Nama Produk">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Simpan Kategori
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