@extends('layouts.admin')
@section('admin-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Treatment Master</h4>
                    <span class="ml-1">Treatmen / Tindakan Kecantikan</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="card-body">
            <a href="{{route('dashboard.treatmen.create')}}" class="btn btn-primary text-white">
                + Tambah Data Produk Kecantikan
            </a>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table-Master Treatmen</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsiv">
                            <table id="crudTable" class="display compact cell-border " style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>

                                        <th>KODE</th>
                                        <th>NAMA JASA</th>
                                        <th>BAGIAN</th>
                                        <th>KODE - BAGIAN</th>
                                        <th>JENIS</th>
                                        <th>TARIF</th>
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
                        { data: 'nama_jasa', name: 'nama_jasa'},
                        { data: 'bagian.nama_bagian', name: 'bagian.nama_bagian', width: '10%' },
                        { data: 'bagian.kode', name: 'bagian.kode', width: '10%' },
                        { data: 'jenis', name: 'jenis', width: '10%' },
                        { data: 'tarif', name: 'tarif', width: '10%' },
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