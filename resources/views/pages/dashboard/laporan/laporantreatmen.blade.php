@extends('layouts.admin')
@section('admin-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Laporan Transaksi Treatmen - List</h4>
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
                                        <th>KODE</th>
                                        <th>NAMA PEMESAN</th>
                                        <th>NO TELEPHONE</th>
                                        <th>ALAMAT</th>
                                        <th>JAM JANJI</th>
                                        <th>TANGGAL JANJI</th>
                                        <th>TOTAL HARGA</th>
                                        <th>STATUS</th>


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
                        { data: 'kode', name: 'kode', width: '5%' },
                        { data: 'nama_pemesan', name: 'nama_pemesan', width: '10%'  },
                        { data: 'no_hp', name: 'no_hp', width: '10%' },
                        { data: 'alamat', name: 'alamat',  },
                        { data: 'jam_janji', name: 'jam_janji', width: '10%' },
                        { data: 'tgl_janji', name: 'tgl_janji', width: '10%' },
                        { data: 'total_price', name: 'total_price', width: '10%' },
                        { data: 'status', name: 'status', width: '10%' },
                        
                    ],
                });
</script>

@endsection