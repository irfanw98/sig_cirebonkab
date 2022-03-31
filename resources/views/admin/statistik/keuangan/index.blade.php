@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Keuangan')

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
                <h3>Keuangan</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Keuangan</li>
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
                    <a href="" name="keuanganTambah" class="btn btn-primary mb-3 p-2 keuanganTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Desa</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 20px;">Bank Umum<br>Pemerintah</th>
                                <th style="padding: 20px;">Bank Umum<br>Swasta</th>
                                <th style="padding: 20px;">Bank Perkreditan<br>Rakyat</th>
                                <th style="padding: 30px;">Koperasi Unit Desa (KUD)</th>
                                <th style="padding: 20px;">Koperasi Industri Kecil Dan<br>Kerajinan Rakyat (Kopinkra)</th>
                                <th style="padding: 20px;">Koperasi Simpan<br>Pinjam (Kospin)</th>
                                <th style="padding: 30px;">Koperasi Lainnya</th>
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
                    Tambah Keuangan
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
                    Edit Keuangan
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
                url: "{{ url('/statistik-menu/keuangan') }}",
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
                    data: 'bank_umum_pemerintah',
                    name: 'bank_umum_pemerintah'
                },
                {
                    data: 'bank_umum_swasta',
                    name: 'bank_umum_swasta'
                },
                {
                    data: 'bank_perkreditan_rakyat',
                    name: 'bank_perkrediran_rakyat'
                },
                {
                    data: 'kud',
                    name: 'kud'
                },
                {
                    data: 'kopinkra',
                    name: 'kopinkra'
                },
                {
                    data: 'kospin',
                    name: 'kospin'
                },
                {
                    data: 'koperasi_lainnya',
                    name: 'koperasi_lainnya'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA KEUANGAN
    $(document).on('click', '.keuanganTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/keuangan/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonKeuangan', function(e) {
        e.preventDefault()
        const formKeuangan = $('.formInsertKeuangan')[0]
        const formDataKeuangan = new FormData(formKeuangan)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#bank_umum_pemerintahError').addClass('d-none')
        $('#bank_umum_swastaError').addClass('d-none')
        $('#bank_perkreditan_rakyatError').addClass('d-none')
        $('#kudError').addClass('d-none')
        $('#kopinkraError').addClass('d-none')
        $('#kospinError').addClass('d-none')
        $('#koperasi_lainnyaError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/keuangan') }}",
            method: "POST",
            data: formDataKeuangan,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertKeuangan').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Keuangan Berhasil Disimpan!',
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
                        $('#bank_umum_pemerintah').removeClass('is-valid')
                        $('#bank_umum_pemerintah').addClass('is-invalid')
                        $('#bank_umum_swasta').removeClass('is-valid')
                        $('#bank_umum_swasta').addClass('is-invalid')
                        $('#bank_perkreditan_rakyat').removeClass('is-valid')
                        $('#bank_perkreditan_rakyat').addClass('is-invalid')
                        $('#kud').removeClass('is-valid')
                        $('#kud').addClass('is-invalid')
                        $('#kopinkra').removeClass('is-valid')
                        $('#kopinkra').addClass('is-invalid')
                        $('#kospin').removeClass('is-valid')
                        $('#kospin').addClass('is-invalid')
                        $('#koperasi_lainnya').removeClass('is-valid')
                        $('#koperasi_lainnya').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA KEUANGAN
    $(document).on('click', '.keuanganEdit', function(e) {
        e.preventDefault()
        const idKeuangan = $(this).attr('idKeuanganEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/keuangan/${idKeuangan}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonKeuangan', function(e) {
        e.preventDefault()
        const formKeuanganId = $('input[id=id_keuangan]').val()
        const formKeuangan = $('.formEditKeuangan')[0]
        const formDataKeuangan = new FormData(formKeuangan)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#bank_umum_pemerintahError').addClass('d-none')
        $('#bank_umum_swastaError').addClass('d-none')
        $('#bank_perkreditan_rakyatError').addClass('d-none')
        $('#kudError').addClass('d-none')
        $('#kopinkraError').addClass('d-none')
        $('#kospinError').addClass('d-none')
        $('#koperasi_lainnyaError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/keuangan/${formKeuanganId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataKeuangan,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditKeuangan').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Keuangan Berhasil Diedit!`,
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
                        $('#bank_umum_pemerintah').removeClass('is-valid')
                        $('#bank_umum_pemerintah').addClass('is-invalid')
                        $('#bank_umum_swasta').removeClass('is-valid')
                        $('#bank_umum_swasta').addClass('is-invalid')
                        $('#bank_perkreditan_rakyat').removeClass('is-valid')
                        $('#bank_perkreditan_rakyat').addClass('is-invalid')
                        $('#kud').removeClass('is-valid')
                        $('#kud').addClass('is-invalid')
                        $('#kopinkra').removeClass('is-valid')
                        $('#kopinkra').addClass('is-invalid')
                        $('#kospin').removeClass('is-valid')
                        $('#kospin').addClass('is-invalid')
                        $('#koperasi_lainnya').removeClass('is-valid')
                        $('#koperasi_lainnya').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //HAPUS DATA KEUANGAN
    $(document).on('click', '.keuanganHapus', function(e) {
        e.preventDefault()
        const idKeuangan = $(this).attr('idKeuanganHapus')
        const tahunKeuangan = $(this).attr('tahunKeuangan')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Keuangan Desa ${namaDesa} Tahun ${tahunKeuangan} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/keuangan/${idKeuangan}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idKeuangan,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Keuangan Desa ${namaDesa} Tahun ${tahunKeuangan} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(data) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Transportasi Gagal Dihapus!`,
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