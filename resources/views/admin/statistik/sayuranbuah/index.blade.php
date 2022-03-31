@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Sayuran Buah')

@section('header')
<style>
    .grad {
        background-color: #ffc107;
        height: 4px;
        border-radius: 20px;
    }
</style>
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h3>Sayuran & Buah</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sayuran & Buah</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="grad">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="" name="sayuranbuahTambah" class="btn btn-primary mb-3 p-2 sayuranbuahTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Kecamatan</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Jenis Tanaman</th>
                                <th style="padding: 30px;">Luas Panen (Ha)</th>
                                <th style="padding: 30px;">Produksi (Kw/qu)</th>
                                <th style="padding: 30px;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal Tambah  -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">
                    Tambah Sayuran & Buah
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">
                    Edit Sayuran & Buah
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            "scrollX": true,
            ajax: {
                url: "{{ url('/statistik-menu/pertanian/sayuran-buah') }}",
                type: "GET",
                dataType: "JSON"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_kecamatan',
                    name: 'nama_kecamatan'
                },
                {
                    data: 'tahun',
                    name: 'tahun'
                },
                {
                    data: 'jenis_tanaman',
                    name: 'jenis_tanaman'
                },
                {
                    data: 'luas_panen',
                    name: 'luas_panen'
                },
                {
                    data: 'produksi',
                    name: 'produksi'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 1, 2, 3, 4, 5, 6],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA SAYURANBUAH
    $(document).on('click', '.sayuranbuahTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/pertanian/sayuran-buah/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonSayuranbuah', function(e) {
        e.preventDefault()
        let formSayuranbuah = $('.formInsertSayuranbuah')[0]
        const formDataSayuranbuah = new FormData(formSayuranbuah)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_tanamanError').addClass('d-none')
        $('#luas_tanamError').addClass('d-none')
        $('#luas_panenError').addClass('d-none')
        $('#produksiError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/pertanian/sayuran-buah') }}",
            method: "POST",
            data: formDataSayuranbuah,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertSayuranbuah').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Sayuran & Buah Berhasil Disimpan!',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(data) {
                let errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        let errID = '#' + key + 'Error'
                        $('#kode_kecamatan').removeClass('is-valid')
                        $('#kode_kecamatan').addClass('is-invalid')
                        $('#tahun').removeClass('is-valid')
                        $('#tahun').addClass('is-invalid')
                        $('#jenis_tanaman').removeClass('is-valid')
                        $('#jenis_tanaman').addClass('is-invalid')
                        $('#luas_tanam').removeClass('is-valid')
                        $('#luas_tanam').addClass('is-invalid')
                        $('#luas_panen').removeClass('is-valid')
                        $('#luas_panen').addClass('is-invalid')
                        $('#produksi').removeClass('is-valid')
                        $('#produksi').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    $(document).on('click', '.sayuranbuahEdit', function(e) {
        e.preventDefault()
        const idSayuranbuah = $(this).attr('idSayuranbuahEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/pertanian/sayuran-buah/${idSayuranbuah}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonSayuranbuah', function(e) {
        e.preventDefault()
        const formSayuranbuahId = $('input[id=id]').val()
        const formSayuranbuah = $('.formEditSayuranbuah')[0]
        const formDataSayuranbuah = new FormData(formSayuranbuah)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_tanamanError').addClass('d-none')
        $('#luas_tanamError').addClass('d-none')
        $('#luas_panenError').addClass('d-none')
        $('#produksiError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/pertanian/sayuran-buah/${formSayuranbuahId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataSayuranbuah,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditSayuranbuah').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Sayuran & Buah Berhasil Diedit!`,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(data) {
                let errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        let errID = '#' + key + 'Error'
                        $('#kode_kecamatan').removeClass('is-valid')
                        $('#kode_kecamatan').addClass('is-invalid')
                        $('#tahun').removeClass('is-valid')
                        $('#tahun').addClass('is-invalid')
                        $('#jenis_tanaman').removeClass('is-valid')
                        $('#jenis_tanaman').addClass('is-invalid')
                        $('#luas_tanam').removeClass('is-valid')
                        $('#luas_tanam').addClass('is-invalid')
                        $('#luas_panen').removeClass('is-valid')
                        $('#luas_panen').addClass('is-invalid')
                        $('#produksi').removeClass('is-valid')
                        $('#produksi').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    $(document).on('click', '.sayuranbuahHapus', function(e) {
        e.preventDefault()
        const idSayuranbuah = $(this).attr('idSayuranbuahHapus')
        const tahunSayuranbuah = $(this).attr('tahunSayuranbuah')
        const namaKecamatan = $(this).attr('namaKecamatan')
        const jenisTanaman = $(this).attr('jenisTanaman')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${jenisTanaman} Kecamatan ${namaKecamatan} Tahun ${tahunSayuranbuah} Akan Dihapus?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `{{ url('/statistik-menu/pertanian/sayuran-buah/${idSayuranbuah}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idSayuranbuah,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Sayuran & Buah Kecamatan ${namaKecamatan} Tahun ${tahunSayuranbuah} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Sayuran & Buah Gagal Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })
            }
        })
    })
</script>
@endsection