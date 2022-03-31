@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Fasilitas Jamban')

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
                <h3>Fasilitas Jamban</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fasilitas Jamban</li>
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
                    <a href="" name="fasilitasjambanTambah" class="btn btn-primary mb-3 p-2 fasilitasjambanTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Kecamatan</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Jamban</th>
                                <th style="padding: 30px;">Banyak Jamban</th>
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
                    Tambah Fasilitas Jamban
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
                    Edit Fasilitas Jamban
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
                url: "{{ url('/statistik-menu/sosial/fasilitas-jamban') }}",
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
                    data: 'nama_jamban',
                    name: 'nama_jamban'
                },
                {
                    data: 'banyak_jamban',
                    name: 'banyak_jamban'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 1, 2, 3, 4, 5],
                "className": "text-center",
            }],
        })
    })

    // TAMBAH DATA JAMBAN
    $(document).on('click', '.fasilitasjambanTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/sosial/fasilitas-jamban/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonFasilitasjamban', function(e) {
        e.preventDefault()
        let formFasilitasjamban = $('.formInsertFasilitasjamban')[0]
        const formDataFasilitasjamban = new FormData(formFasilitasjamban)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#nama_jambanError').addClass('d-none')
        $('#banyak_jambanError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/sosial/fasilitas-jamban') }}",
            method: "POST",
            data: formDataFasilitasjamban,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertFasilitasjamban').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Fasilitas Jamban Berhasil Disimpan!',
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
                        $('#nama_jamban').removeClass('is-valid')
                        $('#nama_jamban').addClass('is-invalid')
                        $('#banyak_jamban').removeClass('is-valid')
                        $('#banyak_jamban').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    $(document).on('click', '.fasilitasjambanEdit', function(e) {
        e.preventDefault()
        const idFasilitasjamban = $(this).attr('idFasilitasjambanEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/sosial/fasilitas-jamban/${idFasilitasjamban}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    // EDIT DATA JAMBAN
    $(document).on('click', '.editButtonFasilitasjamban', function(e) {
        e.preventDefault()
        const formFasilitasjambanId = $('input[id=id]').val()
        const formFasilitasjamban = $('.formEditFasilitasjamban')[0]
        const formDataFasilitasjamban = new FormData(formFasilitasjamban)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#nama_jambanError').addClass('d-none')
        $('#banyak_jambanError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/sosial/fasilitas-jamban/${formFasilitasjambanId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataFasilitasjamban,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditFasilitasjamban').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Fasilitas Jamban Berhasil Diedit!`,
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
                        $('#nama_jamban').removeClass('is-valid')
                        $('#nama_jamban').addClass('is-invalid')
                        $('#banyak_jamban').removeClass('is-valid')
                        $('#banyak_jamban').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    $(document).on('click', '.fasilitasjambanHapus', function(e) {
        e.preventDefault()
        const idFasilitasjamban = $(this).attr('idFasilitasjambanHapus')
        const tahunFasilitasjamban = $(this).attr('tahunFasilitasjamban')
        const namaKecamatan = $(this).attr('namaKecamatan')
        const namafasilitasjamban = $(this).attr('namafasilitasjamban')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${namafasilitasjamban} Kecamatan ${namaKecamatan} Tahun ${tahunFasilitasjamban} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/sosial/fasilitas-jamban/${idFasilitasjamban}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idFasilitasjamban,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data ${namafasilitasjamban} Kecamatan ${namaKecamatan} Tahun ${tahunFasilitasjamban} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Fasilitas Jamban Gagal Dihapus!`,
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