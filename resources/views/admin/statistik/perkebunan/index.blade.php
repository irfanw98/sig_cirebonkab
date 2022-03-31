@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Perkebunan')

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
                <h3>Perkebunan</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Perkebunan</li>
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
                    <a href="" name="perkebunanTambah" class="btn btn-primary mb-3 p-2 perkebunanTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Kecamatan</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Jenis Tanaman</th>
                                <th style="padding: 30px;">Luas Tanam (Ha)</th>
                                <th style="padding: 30px;">Produksi (Ton)</th>
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
                    Tambah Perkebunan
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
                    Edit Perkebunan
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
                url: "{{ url('/statistik-menu/pertanian/perkebunan') }}",
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
                    data: 'luas_areal',
                    name: 'luas_areal'
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

    // TAMBAH DATA PERKEBUNAN
    $(document).on('click', '.perkebunanTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/pertanian/perkebunan/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonPerkebunan', function(e) {
        e.preventDefault()
        let formPerkebunan = $('.formInsertPerkebunan')[0]
        const formDataPerkebunan = new FormData(formPerkebunan)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_tanamanError').addClass('d-none')
        $('#luas_arealError').addClass('d-none')
        $('#luas_panenError').addClass('d-none')
        $('#produksiError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/pertanian/perkebunan') }}",
            method: "POST",
            data: formDataPerkebunan,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertPerkebunan').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Perkebunan Berhasil Disimpan!',
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
                        $('#luas_areal').removeClass('is-valid')
                        $('#luas_areal').addClass('is-invalid')
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

    $(document).on('click', '.perkebunanEdit', function(e) {
        e.preventDefault()
        const idPerkebunan = $(this).attr('idPerkebunanEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/pertanian/perkebunan/${idPerkebunan}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    // EDIT DATA PERKEBUNAN
    $(document).on('click', '.editButtonPerkebunan', function(e) {
        e.preventDefault()
        const formPerkebunanId = $('input[id=id]').val()
        const formPerkebunan = $('.formEditPerkebunan')[0]
        const formDataPerkebunan = new FormData(formPerkebunan)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_tanamanError').addClass('d-none')
        $('#luas_arealError').addClass('d-none')
        $('#luas_panenError').addClass('d-none')
        $('#produksiError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/pertanian/perkebunan/${formPerkebunanId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataPerkebunan,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditPerkebunan').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Perkebunan Berhasil Diedit!`,
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
                        $('#luas_areal').removeClass('is-valid')
                        $('#luas_areal').addClass('is-invalid')
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

    $(document).on('click', '.perkebunanHapus', function(e) {
        e.preventDefault()
        const idPerkebunan = $(this).attr('idPerkebunanHapus')
        const tahunPerkebunan = $(this).attr('tahunPerkebunan')
        const namaKecamatan = $(this).attr('namaKecamatan')
        const jenisTanaman = $(this).attr('jenisTanaman')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${jenisTanaman} Kecamatan ${namaKecamatan} Tahun ${tahunPerkebunan} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/pertanian/perkebunan/${idPerkebunan}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idPerkebunan,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data ${jenisTanaman} Kecamatan ${namaKecamatan} Tahun ${tahunPerkebunan} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Perkebunan Gagal Dihapus!`,
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