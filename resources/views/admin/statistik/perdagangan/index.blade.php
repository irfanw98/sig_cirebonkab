@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Perdagangan')

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
                <h3>Perdagangan</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Perdagangan</li>
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
                    <a href="" name="perdaganganTambah" class="btn btn-primary mb-3 p-2 perdaganganTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 30px;">No</th>
                                <th style="padding: 30px;">Desa</th>
                                <th style="padding: 30px;">Tahun</th>
                                <th style="padding: 20px;">Kelompok<br>Pertokoan</th>
                                <th style="padding: 20px;">Pasar Dengan Bangunan<br>Permanen</th>
                                <th style="padding: 20px;">Pasar Dengan Bangunan<br>Semi Permanen</th>
                                <th style="padding: 20px;">Pasar Tanpa <br>Bangunan</th>
                                <th style="padding: 20px;">Minimarket/<br>Swalayan<sup>1</sup></th>
                                <th style="padding: 20px;">Toko/Warung<br>Kelontong</th>
                                <th style="padding: 20px;">Restoran/Rumah<br>Makan</th>
                                <th style="padding: 20px;">Warung/Kedai<br>Makanan</th>
                                <th style="padding: 30px;">Hotel</th>
                                <th style="padding: 20px;">Hostel/Motel/<br>Losmen/Wisma</th>
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
                    Tambah Perdagangan
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
                    Edit Perdagangan
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
                url: "{{ url('/statistik-menu/perdagangan') }}",
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
                    data: 'kelompok_pertokoan',
                    name: 'kelompok_pertokoan'
                },
                {
                    data: 'pasar_bangunan_permanen',
                    name: 'pasar_bangunan_permanen'
                },
                {
                    data: 'pasar_bangunan_semipermanen',
                    name: 'pasar_bangunan_semipermanen'
                },
                {
                    data: 'pasar_tanpa_bangunan',
                    name: 'pasar_tanpa_bangunan'
                },
                {
                    data: 'minimarket',
                    name: 'minimarket'
                },
                {
                    data: 'toko',
                    name: 'toko'
                },
                {
                    data: 'restoran',
                    name: 'restoran'
                },
                {
                    data: 'warung',
                    name: 'warung'
                },
                {
                    data: 'hotel',
                    name: 'hotel'
                },
                {
                    data: 'motel',
                    name: 'motel'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA PERDAGANGAN
    $(document).on('click', '.perdaganganTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/perdagangan/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonPerdagangan', function(e) {
        e.preventDefault()
        const formPerdagangan = $('.formInsertPerdagangan')[0]
        const formDataPerdagangan = new FormData(formPerdagangan)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#kelompok_pertokoanError').addClass('d-none')
        $('#pasar_bangunan_permanenError').addClass('d-none')
        $('#pasar_tanpa_bangunanError').addClass('d-none')
        $('#pasar_bangunan_semipermanenError').addClass('d-none')
        $('#minimarketError').addClass('d-none')
        $('#tokoError').addClass('d-none')
        $('#restoranError').addClass('d-none')
        $('#warungError').addClass('d-none')
        $('#hotelError').addClass('d-none')
        $('#motelError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/perdagangan') }}",
            method: "POST",
            data: formDataPerdagangan,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertPerdagangan').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Perdagangan Berhasil Disimpan!',
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
                        $('#kelompok_pertokoan').removeClass('is-valid')
                        $('#kelompok_pertokoan').addClass('is-invalid')
                        $('#pasar_bangunan_permanen').removeClass('is-valid')
                        $('#pasar_bangunan_permanen').addClass('is-invalid')
                        $('#pasar_tanpa_bangunan').removeClass('is-valid')
                        $('#pasar_tanpa_bangunan').addClass('is-invalid')
                        $('#pasar_bangunan_semipermanen').removeClass('is-valid')
                        $('#pasar_bangunan_semipermanen').addClass('is-invalid')
                        $('#minimarket').removeClass('is-valid')
                        $('#minimarket').addClass('is-invalid')
                        $('#toko').removeClass('is-valid')
                        $('#toko').addClass('is-invalid')
                        $('#restoran').removeClass('is-valid')
                        $('#restoran').addClass('is-invalid')
                        $('#warung').removeClass('is-valid')
                        $('#warung').addClass('is-invalid')
                        $('#hotel').removeClass('is-valid')
                        $('#hotel').addClass('is-invalid')
                        $('#motel').removeClass('is-valid')
                        $('#motel').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA PERDAGANGAN
    $(document).on('click', '.perdaganganEdit', function(e) {
        e.preventDefault()
        const idPerdagangan = $(this).attr('idPerdaganganEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/perdagangan/${idPerdagangan}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonPerdagangan', function(e) {
        e.preventDefault()
        const formPerdaganganId = $('input[id=id_perdagangan]').val()
        const formPerdagangan = $('.formEditPerdagangan')[0]
        const formDataPerdagangan = new FormData(formPerdagangan)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#kelompok_pertokoanError').addClass('d-none')
        $('#pasar_bangunan_permanenError').addClass('d-none')
        $('#pasar_tanpa_bangunanError').addClass('d-none')
        $('#pasar_bangunan_semipermanenError').addClass('d-none')
        $('#minimarketError').addClass('d-none')
        $('#tokoError').addClass('d-none')
        $('#restoranError').addClass('d-none')
        $('#warungError').addClass('d-none')
        $('#hotelError').addClass('d-none')
        $('#motelError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/perdagangan/${formPerdaganganId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataPerdagangan,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditPerdagangan').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Perdagangan Berhasil Diedit!`,
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
                        $('#kelompok_pertokoan').removeClass('is-valid')
                        $('#kelompok_pertokoan').addClass('is-invalid')
                        $('#pasar_bangunan_permanen').removeClass('is-valid')
                        $('#pasar_bangunan_permanen').addClass('is-invalid')
                        $('#pasar_tanpa_bangunan').removeClass('is-valid')
                        $('#pasar_tanpa_bangunan').addClass('is-invalid')
                        $('#pasar_bangunan_semipermanen').removeClass('is-valid')
                        $('#pasar_bangunan_semipermanen').addClass('is-invalid')
                        $('#minimarket').removeClass('is-valid')
                        $('#minimarket').addClass('is-invalid')
                        $('#toko').removeClass('is-valid')
                        $('#toko').addClass('is-invalid')
                        $('#restoran').removeClass('is-valid')
                        $('#restoran').addClass('is-invalid')
                        $('#warung').removeClass('is-valid')
                        $('#warung').addClass('is-invalid')
                        $('#hotel').removeClass('is-valid')
                        $('#hotel').addClass('is-invalid')
                        $('#motel').removeClass('is-valid')
                        $('#motel').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //HAPUS DATA PERDAGANGAN
    $(document).on('click', '.perdaganganHapus', function(e) {
        e.preventDefault()
        const idPerdagangan = $(this).attr('idPerdaganganHapus')
        const tahunPerdagangan = $(this).attr('tahunPerdagangan')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Perdagangan Desa ${namaDesa} Tahun ${tahunPerdagangan} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/perdagangan/${idPerdagangan}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idPerdagangan,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Perdagangan Desa ${namaDesa} Tahun ${tahunPerdagangan} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(data) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Perdagangan Gagal Dihapus!`,
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