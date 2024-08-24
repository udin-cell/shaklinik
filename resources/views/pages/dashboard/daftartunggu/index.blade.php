@extends('layouts.admin')
@section('admin-content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Buat Daftar Tunggu Pasien</h4>
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
                        <h4 class="card-title">Form Buat Daftar Tunggu </h4>
                    </div>
                    <div class="card-body">
                        <div class="form">
                            <form class="form" action="{{route('dashboard.daftartunggu.store')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-username">
                                                Pilih Dokter Menangani
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="dokter_id" class="form-control dropdownParent s1" id="">
                                                    <option value="">Please select..</option>
                                                    @foreach ($dokter as $d)
                                                    <option class="text-muted" value="{{$d->id}}">{{$d->nama_dokter}} ||
                                                        {{$d->kode_dokter}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-username">
                                                Pilih Pasien
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control dropdownParent s2" name="users_id" id="">
                                                    <option value="">Please select</option>
                                                    @foreach ($pasien as $p)

                                                    <option class="text-muted" value="{{$p->id}}">{{$p->name}} ||
                                                        {{$p->kode_pasien}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-username">
                                                Pilih Treatmen
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control dropdownParent s3" name="treatmen_id" id="">
                                                    <option class="text-muted" value="">Please select</option>
                                                    @foreach ($treatmen as $t)

                                                    <option class="" value="{{$t->id}}">{{$t->nama_jasa}} ||
                                                        {{$t->kode}}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-currency">
                                                Pilih Jam Janji
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="time" class="form-control" id="jam" name="jam" min="10:00"
                                                    max="16:00" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-currency">
                                                Pilih Tanggal Janji

                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tgl" name="tgl" required
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label text-muted" for="val-currency">
                                                Jumlah Pasien
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto mt-2">
                                                <button type="submit" class="btn btn-primary">Buat Daftar
                                                    Tunggu</button>
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


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table-Daftar Tunggu Pasien</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsiv">
                            <table id="crudTable" class="display compact cell-border " style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th class="text-center">NO URUT</th>
                                        <th>KODE JADWAL</th>
                                        <th>DOKTER </th>
                                        <th>NAMA PASIEN</th>
                                        <th>TREATMEN</th>
                                        <th>JENIS / TINDAKAN</th>
                                        <th>BAGIAN</th>
                                        <th>JAM</th>
                                        <th>TANGGAL</th>
                                        <th>JUMLAH</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="text-left text-muted">
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var inputTanggal = document.getElementById('tgl');
  inputTanggal.addEventListener('input', function() {
    var selectedDate = new Date(this.value);
    var dayOfWeek = selectedDate.getDay(); // Mengambil hari dalam bentuk angka (0-6)

    if (dayOfWeek === 3) { // Hari Rabu (0: Minggu, 1: Senin, ..., 6: Sabtu)
      this.value = '';
      Swal.fire({
        icon: 'warning',
        title: 'Hari Rabu Tidak Tersedia',
        text: 'Hari Rabu tidak tersedia untuk Membuat Janji.',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
      });
    }
  });
</script>
<script>
    var inputJam = document.getElementById('jam');
  inputJam.addEventListener('input', function() {
    var selectedTime = this.value;
    var minTime = '10:00';
    var maxTime = '16:00';

    if (selectedTime < minTime || selectedTime > maxTime) {
      this.value = '';
      Swal.fire({
        icon: 'warning',
        title: 'Jam Oprasional 10:00 Sampai Jam 16:00',
        text: 'Pilih Waktu Oprasional Yang Disediakan',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
      });
    }
  });
</script>
<script>
    $(document).ready(function() {
    $('.s1').select2();
});
</script>
<script>
    $(document).ready(function() {
    $('.s2').select2();
});
</script>
<script>
    $(document).ready(function() {
    $('.s3').select2();
});
</script>

<script>
    // AJAX DataTable
                var datatable = $('#crudTable').DataTable({
                    ajax: {
                        url: '{!! url()->current() !!}',
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', width: '1%', },
                        { data: 'no_urut', name: 'no_urut', width: '10%', },
                        { data: 'kode_jadwal', name: 'kode_jadwal', width: '9%',},
                        { data: 'dokter.nama_dokter', name: 'dokter.nama_dokter', width: '15%',},
                        { data: 'user.name', name: 'user.name', width: '15%', },
                        { data: 'treatmen.nama_jasa', name: 'treatmen.nama_jasa', width: '12%'   },
                        { data: 'treatmen.jenis', name: 'treatmen.jenis', width: '12%'  },
                        { data: 'bagian', name: 'bagian', width: '5%' },
                        { data: 'jam', name: 'jam', width: '5%'},
                        { data: 'tgl', name: 'tgl', width: '8%'},
                        { data: 'jumlah', name: 'jumlah',width: '5%' },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            width: '5%',
                        },
                    ],
                });
</script>

@endsection