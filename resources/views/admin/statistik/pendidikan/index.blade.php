@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Pendidikan')

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
                <h3>Pendidikan</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pendidikan</li>
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
                    <a href="" name="pendidikanTambah" class="btn btn-primary mb-3 p-2 pendidikanTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Kecamatan</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Jenjang</th>
                                <th style="padding: 30px;">Nama Sekolah</th>
                                <th style="padding: 30px;">Murid</th>
                                <th style="padding: 30px;">Guru</th>
                                <th style="padding: 30px;">Rasio Murid-Guru</th>
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
                    Tambah Pendidikan
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
                    Edit Pendidikan
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
                url: "{{ url('/statistik-menu/sosial/pendidikan') }}",
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
                    data: 'jenjang',
                    name: 'jenjang'
                },
                {
                    data: 'nama_sekolah',
                    name: 'nama_sekolah'
                },
                {
                    data: 'jumlah_murid',
                    name: 'jumlah_murid'
                },
                {
                    data: 'jumlah_guru',
                    name: 'jumlah_guru'
                },
                {
                    data: 'rasio_murid_guru',
                    name: 'rasio_murid_guru'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 5, 6, 7, 8],
                "className": "text-center",
            }],
        })
    })

    // TAMBAH DATA PENDIDIKAN
    $(document).on('click', '.pendidikanTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/sosial/pendidikan/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonPendidikan', function(e) {
        e.preventDefault()
        let formPendidikan = $('.formInsertPendidikan')[0]
        const formDataPendidikan = new FormData(formPendidikan)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#nama_sekolahError').addClass('d-none')
        $('#jenjangError').addClass('d-none')
        $('#jumlah_muridError').addClass('d-none')
        $('#jumlah_guruError').addClass('d-none')
        $('#rasio_murid_guruError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/sosial/pendidikan') }}",
            method: "POST",
            data: formDataPendidikan,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertPendidikan').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Pendidikan Berhasil Disimpan!',
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
                        $('#nama_sekolah').removeClass('is-valid')
                        $('#nama_sekolah').addClass('is-invalid')
                        $('#jenjang').removeClass('is-valid')
                        $('#jenjang').addClass('is-invalid')
                        $('#jumlah_murid').removeClass('is-valid')
                        $('#jumlah_murid').addClass('is-invalid')
                        $('#jumlah_guru').removeClass('is-valid')
                        $('#jumlah_guru').addClass('is-invalid')
                        $('#rasio_murid_guru').removeClass('is-valid')
                        $('#rasio_murid_guru').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // EDIT DATA PENDIDIKAN
    $(document).on('click', '.pendidikanEdit', function(e) {
        e.preventDefault()
        const idPendidikan = $(this).attr('idPendidikanEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/sosial/pendidikan/${idPendidikan}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonPendidikan', function(e) {
        e.preventDefault()
        const formPendidikanId = $('input[id=id]').val()
        const formPendidikan = $('.formEditPendidikan')[0]
        const formDataPendidikan = new FormData(formPendidikan)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#nama_sekolahError').addClass('d-none')
        $('#jenjangError').addClass('d-none')
        $('#jumlah_muridError').addClass('d-none')
        $('#jumlah_guruError').addClass('d-none')
        $('#rasio_murid_guruError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/sosial/pendidikan/${formPendidikanId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataPendidikan,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditPendidikan').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Pendidikan Berhasil Diedit!`,
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
                        $('#nama_sekolah').removeClass('is-valid')
                        $('#nama_sekolah').addClass('is-invalid')
                        $('#jenjang').removeClass('is-valid')
                        $('#jenjang').addClass('is-invalid')
                        $('#jumlah_murid').removeClass('is-valid')
                        $('#jumlah_murid').addClass('is-invalid')
                        $('#jumlah_guru').removeClass('is-valid')
                        $('#jumlah_guru').addClass('is-invalid')
                        $('#rasio_murid_guru').removeClass('is-valid')
                        $('#rasio_murid_guru').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // HAPUS DATA PENDIDIKAN
    $(document).on('click', '.pendidikanHapus', function(e) {
        e.preventDefault()
        const idPendidikan = $(this).attr('idPendidikanHapus')
        const tahunPendidikan = $(this).attr('tahunPendidikan')
        const namaKecamatan = $(this).attr('namaKecamatan')
        const namaPendidikan = $(this).attr('namaPendidikan')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${namaPendidikan} Kecamatan ${namaKecamatan} Tahun ${tahunPendidikan} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/sosial/pendidikan/${idPendidikan}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idPendidikan,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data ${namaPendidikan} Kecamatan ${namaKecamatan} Tahun ${tahunPendidikan} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Pendidikan Gagal Dihapus!`,
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