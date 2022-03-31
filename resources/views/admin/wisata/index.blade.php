@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Wisata')

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
                <h3>Wisata</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Wisata</li>
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
                    <a href="" name="wisataTambah" class="btn btn-primary mb-3 p-2 wisataTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 20px; text-align: center;" width="5%">No</th>
                                <th style="padding: 20px; text-align: center;" width="20%">Kecamatan</th>
                                <th style="padding: 20px; text-align: center;" width="20%">Desa</th>
                                <th style="padding: 20px; text-align: center;" width="40%">Nama Wisata</th>
                                <th style="padding: 20px; text-align: center;">Aksi</th>
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
                    Tambah Wisata
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
                    Detail Wisata
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
                    Edit Wisata
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
            responsive: true,
            ajax: {
                url: "{{ url('/wisata-menu') }}",
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
                    data: 'nama_desa',
                    name: 'nama_desa',
                },
                {
                    data: 'nama_wisata',
                    name: 'nama_wisata'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 4],
                "className": "text-center",
            }],
        })
    })


    // LOAD MAP PADA TAMBAH DATA WISATA
    $(document).on('show.bs.modal', '#tambahModal', function() {
        setTimeout(function() {
            map.invalidateSize()
        }, 500)
    })

    // TAMBAH DATA WISATA
    $(document).on('click', '.wisataTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/wisata-menu/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonWisata', function(e) {
        e.preventDefault()

        let formWisata = $('.formInsertWisata')[0]
        const formDataWisata = new FormData(formWisata)

        $('#id_desaError').addClass('d-none')
        $('#kode_kecamatanError').addClass('d-none')
        $('#nama_wisataError').addClass('d-none')
        $('#fotoError').addClass('d-none')
        $('#latitudeError').addClass('d-none')
        $('#longitudeError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/wisata-menu') }}",
            method: "POST",
            data: formDataWisata,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertWisata').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Wisata Berhasil Disimpan!',
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
                        $('#nama_wisata').removeClass('is-valid')
                        $('#nama_wisata').addClass('is-invalid')
                        $('#kode_kecamatan').removeClass('is-valid')
                        $('#kode_kecamatan').addClass('is-invalid')
                        $('#foto').removeClass('is-valid')
                        $('#foto').addClass('is-invalid')
                        $('#latitude').removeClass('is-valid')
                        $('#latitude').addClass('is-invalid')
                        $('#longitude').removeClass('is-valid')
                        $('#longitude').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // DETAIL DATA WISATA
    $(document).on('click', '.wisataDetail', function(e) {
        e.preventDefault()
        const idWisata = $(this).attr('idWisataDetail')
        console.log(idWisata)

        $.ajax({
            url: `{{ url('/wisata-menu/${idWisata}') }}`,
            method: "GET",
            success: function(result) {
                $('#detailModal').modal('show')
                $('#detailModal').find('.modal-body').html(result)
            }
        })
    })

    // LOAD MAP PADA EDIT DATA WISATA
    $('#editModal').on('show.bs.modal', function() {
        setTimeout(function() {
            map.invalidateSize();
        }, 500);
    });

    // EDIT DATA WISATA
    $(document).on('click', '.wisataEdit', function(e) {
        e.preventDefault()
        const idWisata = $(this).attr('idWisataEdit')

        $.ajax({
            url: `{{ url('/wisata-menu/${idWisata}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonWisata', function(e) {
        e.preventDefault()
        const formWisataId = $('input[id=id]').val()
        const formWisata = $('.formEditWisata')[0]
        const formDataWisata = new FormData(formWisata)

        $('#id_desaError').addClass('d-none')
        $('#kode_kecamatanError').addClass('d-none')
        $('#nama_wisataError').addClass('d-none')
        $('#fotoError').addClass('d-none')
        $('#latitudeError').addClass('d-none')
        $('#longitudeError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/wisata-menu/${formWisataId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataWisata,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditWisata').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Wisata Berhasil Diedit!`,
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
                        $('#nama_wisata').removeClass('is-valid')
                        $('#nama_wisata').addClass('is-invalid')
                        $('#kode_kecamatan').removeClass('is-valid')
                        $('#kode_kecamatan').addClass('is-invalid')
                        $('#foto').removeClass('is-valid')
                        $('#foto').addClass('is-invalid')
                        $('#latitude').removeClass('is-valid')
                        $('#latitude').addClass('is-invalid')
                        $('#longitude').removeClass('is-valid')
                        $('#longitude').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }

        })
    })


    // HAPUS DATA WISATA
    $(document).on('click', '.wisataHapus', function(e) {
        e.preventDefault()
        const idWisata = $(this).attr('idWisataHapus')
        const namaWisata = $(this).attr('namaWisata')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Wisata ${namaWisata} akan dihapus!`,
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
                    url: `{{ url('/wisata-menu/${idWisata}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idWisata,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Wisata ${namaWisata} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Wisata Gagal Dihapus!`,
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