@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Transportasi')

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
                <h3>Transportasi</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transportasi</li>
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
                    <a href="" name="transportasiTambah" class="btn btn-primary mb-3 p-2 transportasiTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Desa</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 30px;">Jenis Permukaan Jalan</th>
                                <th style="padding: 20px;">Dapat Dilalui Kendaraan Bermotor<br>Roda 4 Atau Lebih</th>
                                <th style="padding: 30px;">Jenis Transportasi</th>
                                <th style="padding: 30px;">Kendaraan Angkutan Umum</th>
                                <th style="padding: 20px;">Jumlah Menara Telepon<br>Seleuler (BTS)</th>
                                <th style="padding: 20px;">Jumlah Operator Layanan Komunikasi<br>Telepon Seluler Yang Menjangkau<br>Di Desa/Kelurahan</th>
                                <th style="padding: 20px;">Kondisi Sinyal Telepon Seluler<br>Di Sebagian Besar Wilayah<br>Desa/Kelurahan</th>
                                <th style="padding: 30px;">Kantor Pos/Pos<br>Pembantu/Rumah Pos</th>
                                <th style="padding: 30px;">Perusahaan/Agen Jasa<br> Ekspedisi Swasta</th>
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
                    Tambah Transportasi
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
                    Edit Transportasi
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
                url: "{{ url('/statistik-menu/transportasi') }}",
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
                    data: 'jenis_permukaan_jalan',
                    name: 'jenis_permukaan_jalan'
                },
                {
                    data: 'akses_kendaraan',
                    name: 'akses_kendaraan'
                },
                {
                    data: 'jenis_transportasi',
                    name: 'jenis_transportasi'
                },
                {
                    data: 'angkutan_umum',
                    name: 'angkutan_umum'
                },
                {
                    data: 'menara_telepon',
                    name: 'menara_telepon'
                },
                {
                    data: 'operator_layanan',
                    name: 'operator-layanan'
                },
                {
                    data: 'sinyal_telepon',
                    name: 'sinyal_telepon'
                },
                {
                    data: 'kantor_pos',
                    name: 'kantor_pos'
                },
                {
                    data: 'perusahaan',
                    name: 'perusahaan'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA TRANSPORTASI
    $(document).on('click', '.transportasiTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/transportasi/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonTransportasi', function(e) {
        e.preventDefault()
        const formTransportasi = $('.formInsertTransportasi')[0]
        const formDataTransportasi = new FormData(formTransportasi)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_permukaan_jalanError').addClass('d-none')
        $('#akses_kendaraanError').addClass('d-none')
        $('#jenis_transportasiError').addClass('d-none')
        $('#angkutan_umumError').addClass('d-none')
        $('#menara_teleponError').addClass('d-none')
        $('#operator_layananError').addClass('d-none')
        $('#sinyal_teleponError').addClass('d-none')
        $('#kantor_posError').addClass('d-none')
        $('#perusahaanError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/transportasi') }}",
            method: "POST",
            data: formDataTransportasi,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertTransportasi').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Transportasi Berhasil Disimpan!',
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
                        $('#jenis_permukaan_jalan').removeClass('is-valid')
                        $('#jenis_permukaan_jalan').addClass('is-invalid')
                        $('#akses_kendaraan').removeClass('is-valid')
                        $('#akses_kendaraan').addClass('is-invalid')
                        $('#jenis_transportasi').removeClass('is-valid')
                        $('#jenis_transportasi').addClass('is-invalid')
                        $('#angkutan_umum').removeClass('is-valid')
                        $('#angkutan_umum').addClass('is-invalid')
                        $('#menara_telepon').removeClass('is-valid')
                        $('#menara_telepon').addClass('is-invalid')
                        $('#operator_layanan').removeClass('is-valid')
                        $('#operator_layanan').addClass('is-invalid')
                        $('#sinyal_telepon').removeClass('is-valid')
                        $('#sinyal_telepon').addClass('is-invalid')
                        $('#kantor_pos').removeClass('is-valid')
                        $('#kantor_pos').addClass('is-invalid')
                        $('#perusahaan').removeClass('is-valid')
                        $('#perusahaan').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA TRANSPORTASI
    $(document).on('click', '.transportasiEdit', function(e) {
        e.preventDefault()
        const idTransportasi = $(this).attr('idTransportasiEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/transportasi/${idTransportasi}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonTransportasi', function(e) {
        e.preventDefault()
        const formTransportasiId = $('input[id=id_transportasi]').val()
        const formTransportasi = $('.formEditTransportasi')[0]
        const formDataTransportasi = new FormData(formTransportasi)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#jenis_permukaan_jalanError').addClass('d-none')
        $('#akses_kendaraanError').addClass('d-none')
        $('#jenis_transportasiError').addClass('d-none')
        $('#angkutan_umumError').addClass('d-none')
        $('#menara_teleponError').addClass('d-none')
        $('#operator_layananError').addClass('d-none')
        $('#sinyal_teleponError').addClass('d-none')
        $('#kantor_posError').addClass('d-none')
        $('#perusahaanError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/transportasi/${formTransportasiId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataTransportasi,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditTransportasi').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Transportasi Berhasil Diedit!`,
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
                        $('#jenis_permukaan_jalan').removeClass('is-valid')
                        $('#jenis_permukaan_jalan').addClass('is-invalid')
                        $('#akses_kendaraan').removeClass('is-valid')
                        $('#akses_kendaraan').addClass('is-invalid')
                        $('#jenis_transportasi').removeClass('is-valid')
                        $('#jenis_transportasi').addClass('is-invalid')
                        $('#angkutan_umum').removeClass('is-valid')
                        $('#angkutan_umum').addClass('is-invalid')
                        $('#menara_telepon').removeClass('is-valid')
                        $('#menara_telepon').addClass('is-invalid')
                        $('#operator_layanan').removeClass('is-valid')
                        $('#operator_layanan').addClass('is-invalid')
                        $('#sinyal_telepon').removeClass('is-valid')
                        $('#sinyal_telepon').addClass('is-invalid')
                        $('#kantor_pos').removeClass('is-valid')
                        $('#kantor_pos').addClass('is-invalid')
                        $('#perusahaan').removeClass('is-valid')
                        $('#perusahaan').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //HAPUS DATA TRANSPORTASI
    $(document).on('click', '.transportasiHapus', function(e) {
        e.preventDefault()
        const idTransportasi = $(this).attr('idTransportasiHapus')
        const tahunTransportasi = $(this).attr('tahunTransportasi')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Transportasi Desa ${namaDesa} Tahun ${tahunTransportasi} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/transportasi/${idTransportasi}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idTransportasi,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Transportasi Desa ${namaDesa} Tahun ${tahunTransportasi} Berhasil Dihapus!`,
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