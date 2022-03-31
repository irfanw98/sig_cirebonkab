@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Penerangan Jalan')

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
                <h3>Penerangan Jalan</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Penerangan Jalan</li>
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
                    <a href="" name="peneranganjalanTambah" class="btn btn-primary mb-3 p-2 peneranganjalanTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Kecamatan</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Penerangan Jalan Utama</th>
                                <th style="padding: 30px;">Banyak Penerangan Jalan Utama</th>
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
                    Tambah Penerangan Jalan
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
                    Edit Penerangan Jalan
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
                url: "{{ url('/statistik-menu/energi/penerangan-jalan') }}",
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
                    data: 'sumber_penerangan_jalan',
                    name: 'sumber_penerangan_jalan'
                },
                {
                    data: 'banyak_penerangan_jalan',
                    name: 'banyak_penerangan_jalan'
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

    // TAMBAH DATA PENERANGAN JALAN
    $(document).on('click', '.peneranganjalanTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/energi/penerangan-jalan/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    });

    $(document).on('click', '.saveButtonPeneranganjalan', function(e) {
        e.preventDefault()
        let formPeneranganjalan = $('.formInsertPeneranganjalan')[0]
        const formDataPeneranganjalan = new FormData(formPeneranganjalan)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#sumber_penerangan_jalanError').addClass('d-none')
        $('#banyak_penerangan_jalanError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/energi/penerangan-jalan') }}",
            method: "POST",
            data: formDataPeneranganjalan,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertPeneranganjalan').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Penerangan Jalan Berhasil Disimpan!',
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
                        $('#sumber_penerangan_jalan').removeClass('is-valid')
                        $('#sumber_penerangan_jalan').addClass('is-invalid')
                        $('#banyak_penerangan_jalan').removeClass('is-valid')
                        $('#banyak_penerangan_jalan').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // EDIT DATA PENERANGAN JALAN
    $(document).on('click', '.peneranganjalanEdit', function(e) {
        e.preventDefault()
        const idPeneranganjalan = $(this).attr('idPeneranganjalanEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/energi/penerangan-jalan/${idPeneranganjalan}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonPeneranganjalan', function(e) {
        e.preventDefault()
        const formPeneranganjalanId = $('input[id=id]').val()
        const formPeneranganjalan = $('.formEditPeneranganjalan')[0]
        const formDataPeneranganjalan = new FormData(formPeneranganjalan)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#sumber_penerangan_jalanError').addClass('d-none')
        $('#banyak_penerangan_jalanError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/energi/penerangan-jalan/${formPeneranganjalanId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataPeneranganjalan,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditPeneranganjalan').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Penerangan Jalan Berhasil Diedit!`,
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
                        $('#sumber_penerangan_jalan').removeClass('is-valid')
                        $('#sumber_penerangan_jalan').addClass('is-invalid')
                        $('#banyak_penerangan_jalan').removeClass('is-valid')
                        $('#banyak_penerangan_jalan').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // HAPUS DATA PENERANGAN JALAN
    $(document).on('click', '.peneranganjalanHapus', function(e) {
        e.preventDefault()
        const idPeneranganjalan = $(this).attr('idPeneranganjalanHapus')
        const tahunPeneranganjalan = $(this).attr('tahunPeneranganjalan')
        const namaKecamatan = $(this).attr('namaKecamatan')
        const sumberPenerangan = $(this).attr('sumberPenerangan')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${sumberPenerangan} Kecamatan ${namaKecamatan} Tahun ${tahunPeneranganjalan} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/energi/penerangan-jalan/${idPeneranganjalan}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idPeneranganjalan,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data ${sumberPenerangan} Kecamatan ${namaKecamatan} Tahun ${tahunPeneranganjalan} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Penerangan Jalan Gagal Dihapus!`,
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