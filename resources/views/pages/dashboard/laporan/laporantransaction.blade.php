@extends('layouts.admin')
@section('admin-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Laporan Transaksi - List</h4>
                    <span class="ml-1">Transaksi Produk - List Sha-Clinic</span>
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


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table-List Transaksi Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsiv">
                            <table id="crudTable" class="display compact cell-border " style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th>KODE INVOICE</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>NO - TELEPHONE</th>
                                        <th>TGL</th>
                                        <th>TOTAL HARGA</th>
                                        <th>Status</th>


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
                        { data: 'kode_inv', name: 'kode_inv', width: '10%' },
                        { data: 'name', name: 'name', width: '10%'  },
                        { data: 'address', name: 'address',  },
                        { data: 'phone', name: 'phone', width: '10%' },
                        { data: 'tgl', name: 'tgl', width: '10%' },
                        { data: 'total_price', name: 'total_price', width: '10%' },
                        { data: 'status', name: 'status', width: '10%' },
                       
                    ],
                });
</script>
@endsection