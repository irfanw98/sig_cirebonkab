@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Geografi')

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
                <h3>Geografi</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Geografi</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="grad">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="" name="geografiTambah" class="btn btn-primary mb-3 p-2 geografiTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th rowspan="2" style="padding: 30px;">No</th>
                                <th rowspan="2" style="padding: 30px;">Desa</th>
                                <th rowspan="2" style="padding: 30px;">Tahun</th>
                                <th colspan="2" class="text-center">Luas Daerah & Ketinggian</th>
                                <th colspan="2" class="text-center">Jarak Antar Desa</th>
                                <th rowspan="2" style="padding: 30px;">Aksi</th>
                            </tr>
                            <tr>
                                <th>Luas (Km<sup>2</sup>)</th>
                                <th>Ketinggian (m)</th>
                                <th>Ibukota Kecamatan</th>
                                <th>Ibukota Kabupaten</th>
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
                    Tambah Geografi
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
                    Edit Geografi
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
                url: "{{ url('/statistik-menu/geografi') }}",
                type: "GET",
                dataType: "JSON"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_desa',
                    name: 'nama_desa'
                },
                {
                    data: 'tahun',
                    name: 'tahun'
                },
                {
                    data: 'luas',
                    name: 'luas'
                },
                {
                    data: 'ketinggian',
                    name: 'ketinggian'
                },
                {
                    data: 'jarak_kecamatan',
                    name: 'jarak_kecamatan',
                    render: function(data, type, full, meta) {
                        return `<p>${data} Km</p>`;
                    }
                },
                {
                    data: 'jarak_kabupaten',
                    name: 'jarak_kabupaten',
                    render: function(data, type, full, meta) {
                        return `<p>${data} Km</p>`;
                    }
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA GEOGRAFI
    $(document).on('click', '.geografiTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/geografi/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonGeografi', function(e) {
        e.preventDefault()
        let formGeografi = $('.formInsertGeografi')[0]
        const formDataGeografi = new FormData(formGeografi)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#luasError').addClass('d-none')
        $('#ketinggianError').addClass('d-none')
        $('#jarak_kecamatanError').addClass('d-none')
        $('#jarak_kabupatenError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/geografi') }}",
            method: "POST",
            data: formDataGeografi,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertGeografi').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Geografi Berhasil Disimpan!',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(data) {
                let errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        let errID = '#' + key + 'Error'
                        $('#id_desa').removeClass('is-valid')
                        $('#id_desa').addClass('is-invalid')
                        $('#tahun').removeClass('is-valid')
                        $('#tahun').addClass('is-invalid')
                        $('#luas').removeClass('is-valid')
                        $('#luas').addClass('is-invalid')
                        $('#ketinggian').removeClass('is-valid')
                        $('#ketinggian').addClass('is-invalid')
                        $('#jarak_kecamatan').removeClass('is-valid')
                        $('#jarak_kecamatan').addClass('is-invalid')
                        $('#jarak_kabupaten').removeClass('is-valid')
                        $('#jarak_kabupaten').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA GEOGRAFI
    $(document).on('click', '.geografiEdit', function(e) {
        e.preventDefault()
        const idGeografi = $(this).attr('idGeografiEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/geografi/${idGeografi}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonGeografi', function(e) {
        e.preventDefault()
        const formGeografiId = $('input[id=id_geografi]').val()
        const formGeografi = $('.formEditGeografi')[0]
        const formDataGeografi = new FormData(formGeografi)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#luasError').addClass('d-none')
        $('#ketinggianError').addClass('d-none')
        $('#jarak_kecamatanError').addClass('d-none')
        $('#jarak_kabupatenError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/geografi/${formGeografiId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataGeografi,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditGeografi').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Geografi Berhasil Diedit!`,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(data) {
                let errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        let errID = '#' + key + 'Error'
                        $('#id_desa').removeClass('is-valid')
                        $('#id_desa').addClass('is-invalid')
                        $('#tahun').removeClass('is-valid')
                        $('#tahun').addClass('is-invalid')
                        $('#luas').removeClass('is-valid')
                        $('#luas').addClass('is-invalid')
                        $('#ketinggian').removeClass('is-valid')
                        $('#ketinggian').addClass('is-invalid')
                        $('#jarak_kecamatan').removeClass('is-valid')
                        $('#jarak_kecamatan').addClass('is-invalid')
                        $('#jarak_kabupaten').removeClass('is-valid')
                        $('#jarak_kabupaten').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //HAPUS DATA GEOGRAFI
    $(document).on('click', '.geografiHapus', function(e) {
        e.preventDefault()
        const idGeografi = $(this).attr('idGeografiHapus')
        const tahunGeografi = $(this).attr('tahunGeografi')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Geografi Desa ${namaDesa} Tahun ${tahunGeografi} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/geografi/${idGeografi}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idGeografi,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Geografi Desa ${namaDesa} Tahun ${tahunGeografi} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Geografi Gagal Dihapus!`,
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