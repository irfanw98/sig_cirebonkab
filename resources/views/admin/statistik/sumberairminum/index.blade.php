@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Sumber Air Minum')

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
                <h3>Sumber Air Minum</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sumber Air Minum</li>
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
                    <a href="" name="sumberairminumTambah" class="btn btn-primary mb-3 p-2 sumberairminumTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Kecamatan</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Sumber Air Minum</th>
                                <th style="padding: 30px;">Banyak Sumber Air Minum</th>
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
                    Tambah Sumber Air Minum
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
                    Edit Sumber Air Minum
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
                url: "{{ url('/statistik-menu/energi/sumber-air-minum') }}",
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
                    data: 'sumber_air_minum',
                    name: 'sumber_air_minum'
                },
                {
                    data: 'banyak_air_minum',
                    name: 'banyak_air_minum'
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

    // TAMBAH DATA SUMBER AIR MINUM
    $(document).on('click', '.sumberairminumTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/energi/sumber-air-minum/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonSumberairminum', function(e) {
        e.preventDefault()
        let formSumberairminum = $('.formInsertSumberairminum')[0]
        const formDataSumberairminum = new FormData(formSumberairminum)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#sumber_air_minumError').addClass('d-none')
        $('#banyak_air_minumError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/energi/sumber-air-minum') }}",
            method: "POST",
            data: formDataSumberairminum,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertSumberairminum').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Sumber Air Minum Berhasil Disimpan!',
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
                        $('#sumber_air_minum').removeClass('is-valid')
                        $('#sumber_air_minum').addClass('is-invalid')
                        $('#banyak_air_minum').removeClass('is-valid')
                        $('#banyak_air_minum').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    $(document).on('click', '.sumberairminumEdit', function(e) {
        e.preventDefault()
        const idSumberairminum = $(this).attr('idSumberairminumEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/energi/sumber-air-minum/${idSumberairminum}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonSumberairminum', function(e) {
        e.preventDefault()
        const formSumberairminumId = $('input[id=id]').val()
        const formSumberairminum = $('.formEditSumberairminum')[0]
        const formDataSumberairminum = new FormData(formSumberairminum)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#sumber_air_minumError').addClass('d-none')
        $('#banyak_air_minumError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/energi/sumber-air-minum/${formSumberairminumId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataSumberairminum,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditSumberairminum').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Sumber Air Minum Berhasil Diedit!`,
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
                        $('#sumber_air_minum').removeClass('is-valid')
                        $('#sumber_air_minum').addClass('is-invalid')
                        $('#banyak_air_minum').removeClass('is-valid')
                        $('#banyak_air_minum').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    $(document).on('click', '.sumberairminumHapus', function(e) {
        e.preventDefault()
        const idSumberairminum = $(this).attr('idSumberairminumHapus')
        const tahunSumberairminum = $(this).attr('tahunSumberairminum')
        const namaKecamatan = $(this).attr('namaKecamatan')
        const sumberairMinum = $(this).attr('sumberairMinum')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${sumberairMinum} Kecamatan ${namaKecamatan} Tahun ${tahunSumberairminum} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/energi/sumber-air-minum/${idSumberairminum}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idSumberairminum,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data ${sumberairMinum} Kecamatan ${namaKecamatan} Tahun ${tahunSumberairminum} Berhasil Dihapus!`,
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