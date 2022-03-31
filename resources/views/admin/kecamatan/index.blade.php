@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Kecamatan')

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
        <div class="row mb-2 mt-2">
            <div class="col-md-6">
                <h3>Kecamatan</h3>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kecamatan</li>
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
                    <a href="" name="kecamatanTambah" class="btn btn-primary mb-3 p-2 kecamatanTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 20px;" width="5%">No</th>
                                <th style="padding: 20px;" width="10%">Kode</th>
                                <th style="padding: 20px;" width="50%">Nama</th>
                                <th style="padding: 20px;" width="15%">Warna</th>
                                <th style="padding: 20px;" width="20%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">
                    Tambah Kecamatan
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">
                    Edit Kecamatan
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
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/kecamatan-menu') }}",
                type: "GET",
                dataType: "JSON"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'kode_kecamatan',
                    name: 'kode_kecamatan'
                },
                {
                    data: 'nama_kecamatan',
                    name: 'nama_kecamatan'
                },
                {
                    data: 'warna_wilayah_kecamatan',
                    name: 'warna_wilayah_kecamatan',
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
                "targets": [0, 1, 4],
                "className": "text-center",
            }],
        })
    })

    // TAMBAH DATA KECAMATAN
    $(document).on('click', '.kecamatanTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/kecamatan-menu/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonKecamatan', function(e) {
        e.preventDefault()
        let formKecamatan = $('.formInsertKecamatan')[0]
        const formDataKecamatan = new FormData(formKecamatan)

        $('#kode_kecamatanError').addClass('d-none')
        $('#nama_kecamatanError').addClass('d-none')
        $('#warna_wilayah_kecamatanError').addClass('d-none')
        $('#geojsonError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/kecamatan-menu') }}",
            method: "POST",
            data: formDataKecamatan,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertKecamatan').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Kecamatan Berhasil Disimpan!',
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
                        $('#nama_kecamatan').removeClass('is-valid')
                        $('#nama_kecamatan').addClass('is-invalid')
                        $('#warna_wilayah_kecamatan').removeClass('is-valid')
                        $('#warna_wilayah_kecamatan').addClass('is-invalid')
                        $('#geojson').removeClass('is-valid')
                        $('#geojson').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // KETIKA MELAKUAN AKSI BUTTON CANCEL PADA MENU TAMBAH DATA
    $(document).on('click', '.cancelButtonKecamatan', function(e) {
        e.preventDefault()
        $('.formInsertKecamatan').trigger('reset')
        $('#kode_kecamatanError').addClass('d-none')
        $('#nama_kecamatanError').addClass('d-none')
        $('#warna_wilayah_kecamatanError').addClass('d-none')
        $('#geojsonError').addClass('d-none')
        $('#nama_kecamatan').removeClass('is-invalid')
        $('#kode_kecamatan').removeClass('is-invalid')
        $('#warna_wilayah_kecamatan').removeClass('is-invalid')
        $('#geojson').removeClass('is-invalid')
    })

    // EDIT DATA KECAMATAN
    $(document).on('click', '.kecamatanEdit', function(e) {
        e.preventDefault()
        const kodeKecamatan = $(this).attr('kodeKecamatan')

        $.ajax({
            url: `{{ url('/kecamatan-menu/${kodeKecamatan}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonKecamatan', function(e) {
        e.preventDefault()
        const formKecamatanId = $('input[id=kode_kecamatan]').val()
        const formKecamatan = $('.formEditKecamatan')[0]
        const formDataKecamatan = new FormData(formKecamatan)

        $('#nama_kecamatanError').addClass('d-none')
        $('#warna_wilayah_kecamatanError').addClass('d-none')
        $('#geojsonError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/kecamatan-menu/${formKecamatanId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataKecamatan,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditKecamatan').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Kecamatan Berhasil Diedit!`,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(data) {
                let errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        let errID = '#' + key + 'Error'
                        $('#nama_kecamatan').removeClass('is-valid')
                        $('#nama_kecamatan').addClass('is-invalid')
                        $('#warna_wilayah_kecamatan').removeClass('is-valid')
                        $('#warna_wilayah_kecamatan').addClass('is-invalid')
                        $('#geojson').removeClass('is-valid')
                        $('#geojson').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // HAPUS DATA KECAMATAN
    $(document).on('click', '.kecamatanHapus', function(e) {
        e.preventDefault()
        const kodeKecamatan = $(this).attr('kodeKecamatan')
        const namaKecamatan = $(this).attr('namaKecamatan')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Kecamatan ${namaKecamatan} akan dihapus!`,
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
                    url: `{{ url('/kecamatan-menu/${kodeKecamatan}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': kodeKecamatan,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Kecamatan ${namaKecamatan} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Kecamatan Gagal Dihapus!`,
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