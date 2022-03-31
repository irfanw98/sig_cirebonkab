@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Pemerintahan')

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
            <div class="col-sm-6">
                <h3>Pemerintahan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pemerintahan</li>
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
                    <a href="" name="pemerintahanTambah" class="btn btn-primary mb-3 p-2 pemerintahanTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th rowspan="2" style="padding: 30px;">No</th>
                                <th rowspan="2" style="padding: 30px;">Desa</th>
                                <th rowspan="2" style="padding: 30px;">Tahun</th>
                                <th rowspan="2" style="padding: 30px;">Kantor Desa</th>
                                <th rowspan="2" style="padding: 30px;">Kepala Desa/Lurah</th>
                                <th rowspan="2" style="padding: 30px;">Sekretaris Desa</th>
                                <th rowspan="2" style="padding: 30px;">Kepala Urusan (KAUR)</th>
                                <th rowspan="2" style="padding: 30px;">Kepala Dusun</th>
                                <th rowspan="2" style="padding: 30px;">Hansip</th>
                                <th rowspan="2" style="padding: 30px;">Pos Kamling</th>
                                <th rowspan="2" style="padding: 30px;">Dusun</th>
                                <th rowspan="2" style="padding: 30px;">Rukun Warga (RW)</th>
                                <th rowspan="2" style="padding: 30px;">Rukun Tentangg (RT)</th>
                                <th colspan="5" class="text-center">BPD</th>
                                <th colspan="5" class="text-center">LPMD</th>
                                <th rowspan="2" style="padding: 30px;">Aksi</th>
                            </tr>
                            <tr>
                                <th>Ketua</th>
                                <th>Wakil</th>
                                <th>Sekretaris</th>
                                <th>Bendahara</th>
                                <th>Anggota</th>
                                <th>Ketua</th>
                                <th>Wakil</th>
                                <th>Sekretaris</th>
                                <th>Bendahara</th>
                                <th>Anggota</th>
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
                    Tambah Pemerintahan
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
                    Edit Pemerintahan
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
                url: "{{ url('/statistik-menu/pemerintahan') }}",
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
                    data: 'kantor_desa',
                    name: 'kantor_desa'
                },
                {
                    data: 'kepala_desa',
                    name: 'kepala_desa'
                },
                {
                    data: 'sekretaris_desa',
                    name: 'sekretaris_desa'
                },
                {
                    data: 'kepala_urusan',
                    name: 'kepala_urusan'
                },
                {
                    data: 'kepala_dusun',
                    name: 'kepala_dusun'
                },
                {
                    data: 'hansip',
                    name: 'hansip'
                },
                {
                    data: 'pos_kamling',
                    name: 'pos_kamling'
                },
                {
                    data: 'dusun',
                    name: 'dusun'
                },
                {
                    data: 'rukun_warga',
                    name: 'rukun_warga'
                },
                {
                    data: 'rukun_tetangga',
                    name: 'rukun_tetangga'
                },
                {
                    data: 'ketua_bpd',
                    name: 'ketua_bpd'
                },
                {
                    data: 'wakil_bpd',
                    name: 'wakil_bpd'
                },
                {
                    data: 'sekretaris_bpd',
                    name: 'sekretaris_bpd'
                },
                {
                    data: 'bendahara_bpd',
                    name: 'bendahara_bpd'
                },
                {
                    data: 'anggota_bpd',
                    name: 'anggota_bpd'
                },
                {
                    data: 'ketua_lpmd',
                    name: 'ketua_lpmd'
                },
                {
                    data: 'wakil_lpmd',
                    name: 'wakil_lpmd'
                },
                {
                    data: 'sekretaris_lpmd',
                    name: 'sekretaris_lpmd'
                },
                {
                    data: 'bendahara_lpmd',
                    name: 'bendahara_lpmd'
                },
                {
                    data: 'anggota_lpmd',
                    name: 'anggota_lpmd'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA PEMERINTAHAN
    $(document).on('click', '.pemerintahanTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/pemerintahan/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonPemerintahan', function(e) {
        e.preventDefault()
        let formPemerintahan = $('.formInsertPemerintahan')[0]
        const formDataPemerintahan = new FormData(formPemerintahan)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#kantor_desaError').addClass('d-none')
        $('#kepala_desaError').addClass('d-none')
        $('#sekretaris_desaError').addClass('d-none')
        $('#kepala_urusanError').addClass('d-none')
        $('#kepala_dusunError').addClass('d-none')
        $('#hansipError').addClass('d-none')
        $('#pos_kamlingError').addClass('d-none')
        $('#dusunError').addClass('d-none')
        $('#rukun_wargaError').addClass('d-none')
        $('#rukun_tetanggaError').addClass('d-none')
        $('#ketua_bpdError').addClass('d-none')
        $('#wakil_bpdError').addClass('d-none')
        $('#sekretaris_bpdError').addClass('d-none')
        $('#bendahara_bpdError').addClass('d-none')
        $('#anggota_bpdError').addClass('d-none')
        $('#ketua_lpmdError').addClass('d-none')
        $('#wakil_lpmdError').addClass('d-none')
        $('#sekretaris_lpmdError').addClass('d-none')
        $('#bendahara_lpmdError').addClass('d-none')
        $('#anggota_lpmdError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/pemerintahan') }}",
            method: "POST",
            data: formDataPemerintahan,
            contentType: false,
            processData: false,
            cache: false,
            success: function(response) {
                $('.formInsertPemerintahan').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Pemerintahan Berhasil Disimpan!',
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
                        $('#kantor_desa').removeClass('is-valid')
                        $('#kantor_desa').addClass('is-invalid')
                        $('#kepala_desa').removeClass('is-valid')
                        $('#kepala_desa').addClass('is-invalid')
                        $('#sekretaris_desa').removeClass('is-valid')
                        $('#sekretaris_desa').addClass('is-invalid')
                        $('#kepala_urusan').removeClass('is-valid')
                        $('#kepala_urusan').addClass('is-invalid')
                        $('#kepala_dusun').removeClass('is-valid')
                        $('#kepala_dusun').addClass('is-invalid')
                        $('#hansip').removeClass('is-valid')
                        $('#hansip').addClass('is-invalid')
                        $('#pos_kamling').removeClass('is-valid')
                        $('#pos_kamling').addClass('is-invalid')
                        $('#dusun').removeClass('is-valid')
                        $('#dusun').addClass('is-invalid')
                        $('#rukun_warga').removeClass('is-valid')
                        $('#rukun_warga').addClass('is-invalid')
                        $('#rukun_tetangga').removeClass('is-valid')
                        $('#rukun_tetangga').addClass('is-invalid')
                        $('#ketua_bpd').removeClass('is-valid')
                        $('#ketua_bpd').addClass('is-invalid')
                        $('#wakil_bpd').removeClass('is-valid')
                        $('#wakil_bpd').addClass('is-invalid')
                        $('#sekretaris_bpd').removeClass('is-valid')
                        $('#sekretaris_bpd').addClass('is-invalid')
                        $('#bendahara_bpd').removeClass('is-valid')
                        $('#bendahara_bpd').addClass('is-invalid')
                        $('#anggota_bpd').removeClass('is-valid')
                        $('#anggota_bpd').addClass('is-invalid')
                        $('#ketua_lpmd').removeClass('is-valid')
                        $('#ketua_lpmd').addClass('is-invalid')
                        $('#wakil_lpmd').removeClass('is-valid')
                        $('#wakil_lpmd').addClass('is-invalid')
                        $('#sekretaris_lpmd').removeClass('is-valid')
                        $('#sekretaris_lpmd').addClass('is-invalid')
                        $('#bendahara_lpmd').removeClass('is-valid')
                        $('#bendahara_lpmd').addClass('is-invalid')
                        $('#anggota_lpmd').removeClass('is-valid')
                        $('#anggota_lpmd').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA PEMERINTAHAN
    $(document).on('click', '.pemerintahanEdit', function(e) {
        e.preventDefault()
        const idPemerintahan = $(this).attr('idPemerintahanEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/pemerintahan/${idPemerintahan}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonPemerintahan', function(e) {
        e.preventDefault()
        const formPemerintahanId = $('input[id=id_pemerintahan]').val()
        const formPemerintahan = $('.formEditPemerintahan')[0]
        const formDataPemerintahan = new FormData(formPemerintahan)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#kantor_desaError').addClass('d-none')
        $('#kepala_desaError').addClass('d-none')
        $('#sekretaris_desaError').addClass('d-none')
        $('#kepala_urusanError').addClass('d-none')
        $('#kepala_dusunError').addClass('d-none')
        $('#hansipError').addClass('d-none')
        $('#pos_kamlingError').addClass('d-none')
        $('#dusunError').addClass('d-none')
        $('#rukun_wargaError').addClass('d-none')
        $('#rukun_tetanggaError').addClass('d-none')
        $('#ketua_bpdError').addClass('d-none')
        $('#wakil_bpdError').addClass('d-none')
        $('#sekretaris_bpdError').addClass('d-none')
        $('#bendahara_bpdError').addClass('d-none')
        $('#anggota_bpdError').addClass('d-none')
        $('#ketua_lpmdError').addClass('d-none')
        $('#wakil_lpmdError').addClass('d-none')
        $('#sekretaris_lpmdError').addClass('d-none')
        $('#bendahara_lpmdError').addClass('d-none')
        $('#anggota_lpmdError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/pemerintahan/${formPemerintahanId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataPemerintahan,
            success: function(response) {
                $('.formEditPemerintahan').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Pemerintahan Berhasil Diedit!`,
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
                        $('#kantor_desa').removeClass('is-valid')
                        $('#kantor_desa').addClass('is-invalid')
                        $('#kepala_desa').removeClass('is-valid')
                        $('#kepala_desa').addClass('is-invalid')
                        $('#sekretaris_desa').removeClass('is-valid')
                        $('#sekretaris_desa').addClass('is-invalid')
                        $('#kepala_urusan').removeClass('is-valid')
                        $('#kepala_urusan').addClass('is-invalid')
                        $('#kepala_dusun').removeClass('is-valid')
                        $('#kepala_dusun').addClass('is-invalid')
                        $('#hansip').removeClass('is-valid')
                        $('#hansip').addClass('is-invalid')
                        $('#pos_kamling').removeClass('is-valid')
                        $('#pos_kamling').addClass('is-invalid')
                        $('#dusun').removeClass('is-valid')
                        $('#dusun').addClass('is-invalid')
                        $('#rukun_warga').removeClass('is-valid')
                        $('#rukun_warga').addClass('is-invalid')
                        $('#rukun_tetangga').removeClass('is-valid')
                        $('#rukun_tetangga').addClass('is-invalid')
                        $('#ketua_bpd').removeClass('is-valid')
                        $('#ketua_bpd').addClass('is-invalid')
                        $('#wakil_bpd').removeClass('is-valid')
                        $('#wakil_bpd').addClass('is-invalid')
                        $('#sekretaris_bpd').removeClass('is-valid')
                        $('#sekretaris_bpd').addClass('is-invalid')
                        $('#bendahara_bpd').removeClass('is-valid')
                        $('#bendahara_bpd').addClass('is-invalid')
                        $('#anggota_bpd').removeClass('is-valid')
                        $('#anggota_bpd').addClass('is-invalid')
                        $('#ketua_lpmd').removeClass('is-valid')
                        $('#ketua_lpmd').addClass('is-invalid')
                        $('#wakil_lpmd').removeClass('is-valid')
                        $('#wakil_lpmd').addClass('is-invalid')
                        $('#sekretaris_lpmd').removeClass('is-valid')
                        $('#sekretaris_lpmd').addClass('is-invalid')
                        $('#bendahara_lpmd').removeClass('is-valid')
                        $('#bendahara_lpmd').addClass('is-invalid')
                        $('#anggota_lpmd').removeClass('is-valid')
                        $('#anggota_lpmd').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //HAPUS DATA PEMERINTAHAN
    $(document).on('click', '.pemerintahanHapus', function(e) {
        e.preventDefault()
        const idPemerintahan = $(this).attr('idPemerintahanHapus')
        const tahunPemerintahan = $(this).attr('tahunPemerintahan')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Pemerintahan Desa ${namaDesa} Tahun ${tahunPemerintahan} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/pemerintahan/${idPemerintahan}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idPemerintahan,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Pemerintahan Desa ${namaDesa} Tahun ${tahunPemerintahan} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data PemerintahanGagal Dihapus!`,
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