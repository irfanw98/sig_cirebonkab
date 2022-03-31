@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Bahan Bakar Memasak')

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
                <h3>Bahan Bakar Memasak</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Bahan Bakar Memasak</li>
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
                    <a href="" name="bahanbakarmemasakTambah" class="btn btn-primary mb-3 p-2 bahanbakarmemasakTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Kecamatan</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Jenis Bahan Bakar</th>
                                <th style="padding: 30px;">Banyak Bahan Bakar</th>
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
                    Tambah Bahan Bakar Memasak
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
                    Edit Bahan Bakar Memasak
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
                url: "{{ url('/statistik-menu/energi/bahan-bakar-memasak') }}",
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
                    data: 'jenis_bahan_bakar',
                    name: 'jenis_bahan_bakar'
                },
                {
                    data: 'banyak_bahan_bakar',
                    name: 'banyak_bahan_bakar'
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

    // TAMBAH DATA BAHAN BAKAR MEMASAK
    $(document).on('click', '.bahanbakarmemasakTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/energi/bahan-bakar-memasak/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonBahanbakarmemasak', function(e) {
        e.preventDefault()
        let formBahanbakarmemasak = $('.formInsertBahanbakarmemasak')[0]
        const formDataBahanbakarmemasak = new FormData(formBahanbakarmemasak)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_bahan_bakarError').addClass('d-none')
        $('#banyak_bahan_bakarError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/energi/bahan-bakar-memasak') }}",
            method: "POST",
            data: formDataBahanbakarmemasak,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertBahanbakarmemasak').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Bahan Bakar Memasak Berhasil Disimpan!',
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
                        $('#jenis_bahan_bakar').removeClass('is-valid')
                        $('#jenis_bahan_bakar').addClass('is-invalid')
                        $('#banyak_bahan_bakar').removeClass('is-valid')
                        $('#banyak_bahan_bakar').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // EDIT DATA BAHAN BAKAR MEMASAK
    $(document).on('click', '.bahanbakarmemasakEdit', function(e) {
        e.preventDefault()
        const idBahanbakarmemasak = $(this).attr('idBahanbakarmemasakEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/energi/bahan-bakar-memasak/${idBahanbakarmemasak}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonBahanbakarmemasak', function(e) {
        e.preventDefault()
        const formBahanbakarmemasakId = $('input[id=id]').val()
        const formBahanbakarmemasak = $('.formEditBahanbakarmemasak')[0]
        const formDataBahanbakarmemasak = new FormData(formBahanbakarmemasak)

        $('#kode_kecamatanError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_bahan_bakarError').addClass('d-none')
        $('#banyak_bahan_bakarError').addClass('d-none')


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/energi/bahan-bakar-memasak/${formBahanbakarmemasakId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataBahanbakarmemasak,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditBahanbakarmemasak').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Bahan Bakar Memasak Berhasil Diedit!`,
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
                        $('#jenis_bahan_bakar').removeClass('is-valid')
                        $('#jenis_bahan_bakar').addClass('is-invalid')
                        $('#banyak_bahan_bakar').removeClass('is-valid')
                        $('#banyak_bahan_bakar').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    // HAPUS DATA BAHAN BAKAR MEMASAK
    $(document).on('click', '.bahanbakarmemasakHapus', function(e) {
        e.preventDefault()
        const idBahanbakarmemasak = $(this).attr('idBahanbakarmemasakHapus')
        const tahunBahanbakarmemasak = $(this).attr('tahunBahanbakarmemasak')
        const namaKecamatan = $(this).attr('namaKecamatan')
        const jenisBahanbakarmemasak = $(this).attr('jenisBahanbakarmemasak')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${jenisBahanbakarmemasak} Kecamatan ${namaKecamatan} Tahun ${tahunBahanbakarmemasak} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/energi/bahan-bakar-memasak/${idBahanbakarmemasak}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idBahanbakarmemasak,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data ${jenisBahanbakarmemasak} Kecamatan ${namaKecamatan} Tahun ${tahunBahanbakarmemasak} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Bahan Bakar Memasak Gagal Dihapus!`,
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