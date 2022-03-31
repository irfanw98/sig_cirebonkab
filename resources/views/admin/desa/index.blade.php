@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Desa')

@section('header')
<style>
    .grad {
        background-color: #ffc107;
        height: 4px;
        border-radius: 20px;
    }
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-md-6">
                <h3>Desa</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Desa</li>
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
                    <a href="" name="desaTambah" class="btn btn-primary mb-3 p-2 desaTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 20px;">No</th>
                                <th style="padding: 20px;">Kecamatan</th>
                                <th style="padding: 20px;">Kode</th>
                                <th style="padding: 20px;">Nama</th>
                                <th style="padding: 20px;">Latitude</th>
                                <th style="padding: 20px;">Longitude</th>
                                <th style="padding: 20px;">Warna</th>
                                <th style="padding: 20px;">Aksi</th>
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
                    Tambah Desa
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

<!-- Modal Detail Desa -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">
                    Detail Desa
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
                    Edit Desa
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
                url: "{{ url('/desa-menu') }}",
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
                    data: 'kode_desa',
                    name: 'kode_desa',
                },
                {
                    data: 'nama_desa',
                    name: 'nama_desa'
                },
                {
                    data: 'latitude',
                    name: 'latitude'
                },
                {
                    data: 'longitude',
                    name: 'longitude'
                },
                {
                    data: 'warna_wilayah_desa',
                    name: 'warna_wilayah_desa',
                    render: function(data, type, full, meta) {
                        return `<p style="
                            background-color: ${data}; 
                            color: ${data}; 
                            width: 80;
                            height: 40; 
                            ">${data}</p>`;
                    },
                    orderable: false
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 6, 7],
                "className": "text-center",
            }],
        })
    })

    // LOAD MAP PADA TAMBAH DATA DESA
    $(document).on('show.bs.modal', '#tambahModal', function() {
        setTimeout(function() {
            map.invalidateSize()
        }, 500)
    })

    // TAMBAH DATA DESA
    $(document).on('click', '.desaTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/desa-menu/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonDesa', function(e) {
        e.preventDefault()
        let formDesa = $('.formInsertDesa')[0]
        const formDataDesa = new FormData(formDesa)

        $('#kode_desaError').addClass('d-none')
        $('#kode_kecamatanError').addClass('d-none')
        $('#nama_desaError').addClass('d-none')
        $('#fotoError').addClass('d-none')
        $('#latitudeError').addClass('d-none')
        $('#longitudeError').addClass('d-none')
        $('#warna_wilayah_desaError').addClass('d-none')
        $('#geojsonError').addClass('d-none')
        $('#deskripsiError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/desa-menu') }}",
            method: "POST",
            data: formDataDesa,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertDesa').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Desa Berhasil Disimpan!',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(data) {
                let errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        let errID = '#' + key + 'Error'
                        $('#kode_desa').removeClass('is-valid')
                        $('#kode_desa').addClass('is-invalid')
                        $('#nama_desa').removeClass('is-valid')
                        $('#nama_desa').addClass('is-invalid')
                        $('#kode_kecamatan').removeClass('is-valid')
                        $('#kode_kecamatan').addClass('is-invalid')
                        $('#foto').removeClass('is-valid')
                        $('#foto').addClass('is-invalid')
                        $('#latitude').removeClass('is-valid')
                        $('#latitude').addClass('is-invalid')
                        $('#longitude').removeClass('is-valid')
                        $('#longitude').addClass('is-invalid')
                        $('#warna_wilayah_desa').removeClass('is-valid')
                        $('#warna_wilayah_desa').addClass('is-invalid')
                        $('#geojson').removeClass('is-valid')
                        $('#geojson').addClass('is-invalid')
                        $('#deskripsi').removeClass('is-valid')
                        $('#deskripsi').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // KETIKA MELAKUAN AKSI BUTTON CANCEL PADA MENU TAMBAH DATA
    $(document).on('click', '.cancelButtonDesa', function(e) {
        e.preventDefault()
        $('.formInsertDesa').trigger('reset')
        $('#kode_desaError').addClass('d-none')
        $('#kode_kecamatanError').addClass('d-none')
        $('#nama_desaError').addClass('d-none')
        $('#fotoError').addClass('d-none')
        $('#latitudeError').addClass('d-none')
        $('#longitudeError').addClass('d-none')
        $('#warna_wilayahError').addClass('d-none')
        $('#geojsonError').addClass('d-none')
        $('#deskripsiError').addClass('d-none')
        $('#kode_desa').removeClass('is-valid')
        $('#kode_kecamatan').removeClass('is-invalid')
        $('#nama_desa').removeClass('is-invalid')
        $('#foto').removeClass('is-valid')
        $('#latitude').removeClass('is-valid')
        $('#longitude').removeClass('is-valid')
        $('#warna_wilayah_desa').removeClass('is-valid')
        $('#geojson').removeClass('is-valid')
        $('#deskripsi').removeClass('is-valid')
    })

    // DETAIL DATA DESA
    $(document).on('click', '.desaDetail', function(e) {
        e.preventDefault()
        const idDesa = $(this).attr('idDesaDetail')

        $.ajax({
            url: `{{ url('/desa-menu/${idDesa}') }}`,
            method: "GET",
            success: function(result) {
                $('#detailModal').modal('show')
                $('#detailModal').find('.modal-body').html(result)
            }
        })
    })

    // LOAD MAP PADA EDIT DATA DESA
    $('#editModal').on('show.bs.modal', function() {
        setTimeout(function() {
            map.invalidateSize();
        }, 500);
    });

    // EDIT DATA DESA
    $(document).on('click', '.desaEdit', function(e) {
        e.preventDefault()
        const idDesa = $(this).attr('idDesaEdit')

        $.ajax({
            url: `{{ url('/desa-menu/${idDesa}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonDesa', function(e) {
        e.preventDefault()
        const formDesaId = $('input[id=id_desa]').val()
        const formDesa = $('.formEditDesa')[0]
        const formDataDesa = new FormData(formDesa)

        $('#nama_desaError').addClass('d-none')
        $('#latitudeError').addClass('d-none')
        $('#longitudeError').addClass('d-none')
        $('#warna_wilayah_desaError').addClass('d-none')
        $('#geojsonError').addClass('d-none')
        $('#deskripsiError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/desa-menu/${formDesaId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataDesa,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditDesa').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Desa Berhasil Diedit!`,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(data) {
                let errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function(key, value) {
                            let errID = '#' + key + 'Error'
                            $('#nama_desa').removeClass('is-valid')
                            $('#nama_desa').addClass('is-invalid')
                            $('#warna_wilayah_desa').removeClass('is-valid')
                            $('#warna_wilayah_desa').addClass('is-invalid')
                            $('#geojson').removeClass('is-valid')
                            $('#geojson').addClass('is-invalid')
                            $('#latitude').removeClass('is-valid')
                            $('#latitude').addClass('is-invalid')
                            $('#longitude').removeClass('is-valid')
                            $('#longitude').addClass('is-invalid')
                            $('#deskripsi').removeClass('is-valid')
                            $('#deskripsi').addClass('is-invalid')
                            $(errID).removeClass('d-none')
                            $(errID).text(value)
                        })
                    }
            }

        })
    })

    // HAPUS DATA DESA
    $(document).on('click', '.desaHapus', function(e) {
        e.preventDefault()
        const idDesa = $(this).attr('idDesaHapus')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Desa ${namaDesa} akan dihapus!`,
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
                    url: `{{ url('/desa-menu/${idDesa}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idDesa,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Desa ${namaDesa} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Desa Gagal Dihapus!`,
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