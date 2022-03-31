@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Penduduk')

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
                <h3>Penduduk</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Penduduk</li>
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
                    <a href="" name="pendudukTambah" class="btn btn-primary mb-3 p-2 pendudukTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 20px;">No</th>
                                <th style="padding: 20px;">Desa</th>
                                <th style="padding: 20px;">Tahun</th>
                                <th style="padding: 20px;">Penduduk (Jiwa<sup>1</sup>)</th>
                                <th>Laju Petumbuhan Penduduk<br>
                                    per Tahun 2010-2020<sup>23</sup>
                                </th>
                                <th style="padding: 20px;">Persentase Penduduk</th>
                                <th style="padding: 20px;">Kepadatan Penduduk (per km<sup>2</sup>)<sup>4</sup></th>
                                <th style="padding: 20px;">Rasio Jenis Kelamin</th>
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
                    Tambah Penduduk
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
                    Edit Penduduk
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
                url: "{{ url('/statistik-menu/penduduk') }}",
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
                    data: 'jumlah',
                    name: 'jumlah'
                },
                {
                    data: 'laju',
                    name: 'laju'
                },
                {
                    data: 'persentase',
                    name: 'persentase',
                },
                {
                    data: 'kepadatan',
                    name: 'kepadatan',
                },
                {
                    data: 'rasio_jk',
                    name: 'rasio_jk'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7, 8],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA PENDUDUK
    $(document).on('click', '.pendudukTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/penduduk/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonPenduduk', function(e) {
        e.preventDefault()
        const formPenduduk = $('.formInsertPenduduk')[0]
        const formDataPenduduk = new FormData(formPenduduk)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jumlahError').addClass('d-none')
        $('#lajuError').addClass('d-none')
        $('#persentaseError').addClass('d-none')
        $('#kepadatanError').addClass('d-none')
        $('#rasio_jkError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/penduduk') }}",
            method: "POST",
            data: formDataPenduduk,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertPenduduk').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Penduduk Berhasil Disimpan!',
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
                        $('#jumlah').removeClass('is-valid')
                        $('#jumlah').addClass('is-invalid')
                        $('#laju').removeClass('is-valid')
                        $('#laju').addClass('is-invalid')
                        $('#persentase').removeClass('is-valid')
                        $('#persentase').addClass('is-invalid')
                        $('#kepadatan').removeClass('is-valid')
                        $('#kepadatan').addClass('is-invalid')
                        $('#rasio_jk').removeClass('is-valid')
                        $('#rasio_jk').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA PENDUDUK
    $(document).on('click', '.pendudukEdit', function(e) {
        e.preventDefault()
        const idPenduduk = $(this).attr('idPendudukEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/penduduk/${idPenduduk}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonPenduduk', function(e) {
        e.preventDefault()
        const formPendudukId = $('input[id=id_penduduk]').val()
        const formPenduduk = $('.formEditPenduduk')[0]
        const formDataPenduduk = new FormData(formPenduduk)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jumlahError').addClass('d-none')
        $('#lajuError').addClass('d-none')
        $('#persentaseError').addClass('d-none')
        $('#kepadatanError').addClass('d-none')
        $('#rasio_jkError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/penduduk/${formPendudukId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataPenduduk,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditPenduduk').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Penduduk Berhasil Diedit!`,
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
                        $('#jumlah').removeClass('is-valid')
                        $('#jumlah').addClass('is-invalid')
                        $('#laju').removeClass('is-valid')
                        $('#laju').addClass('is-invalid')
                        $('#persentase').removeClass('is-valid')
                        $('#persentase').addClass('is-invalid')
                        $('#kepadatan').removeClass('is-valid')
                        $('#kepadatan').addClass('is-invalid')
                        $('#rasio_jk').removeClass('is-valid')
                        $('#rasio_jk').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // HAPUS DATA PENDUDUK
    $(document).on('click', '.pendudukHapus', function(e) {
        e.preventDefault()
        const idPenduduk = $(this).attr('idPendudukHapus')
        const tahunPenduduk = $(this).attr('tahunPenduduk')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Penduduk Desa ${namaDesa} Tahun ${tahunPenduduk} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/penduduk/${idPenduduk}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idPenduduk,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Penduduk Desa ${namaDesa} Tahun ${tahunPenduduk} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(data) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Penduduk Gagal Dihapus!`,
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