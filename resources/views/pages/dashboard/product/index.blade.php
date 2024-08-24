@extends('layouts.admin')
@section('admin-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Produk Master</h4>
                    <span class="ml-1">Product Kecantikan</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <div class="card-body">
            <a href="{{route('dashboard.product.create')}}" class="btn btn-primary text-white">
                + Tambah Data Produk Kecantikan
            </a>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table-Master Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsiv">
                            <table id="crudTable" class="display compact cell-border " style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th>KODE</th>
                                        <th>NAMA</th>
                                        <th>KATEGORI</th>
                                        <th>KODE - KATEGORI</th>
                                        <th>STOCK</th>
                                        <th>HARGA</th>
                                        <th>AKSI</th>

                                    </tr>
                                </thead>
                                <tbody class="text-left text-muted">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // AJAX DataTable
                var datatable = $('#crudTable').DataTable({
                    ajax: {
                        url: '{!! url()->current() !!}',
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', width: '1%', },
                        { data: 'kode', name: 'kode', width: '10%' },
                        { data: 'name', name: 'name',  },
                        { data: 'category.name', name: 'category.name', width: '10%' },
                        { data: 'category.kode', name: 'category.kode', width: '10%' },
                        { data: 'stock', name: 'stock', width: '10%' },
                        { data: 'price', name: 'price', width: '10%' },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            width: '15%'
                        },
                    ],
                });
</script>

@endsection