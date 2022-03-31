@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Energi')

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
                <h3>Energi</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Energi</li>
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
                    <a href="" name="energiTambah" class="btn btn-primary mb-3 p-2 energiTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th rowspan="2" style="padding: 30px;">No</th>
                                <th rowspan="2" style="padding: 30px;">Desa</th>
                                <th rowspan="2" style="padding: 30px;">Tahun</th>
                                <th colspan="3" class="text-center">Pengguna Listrik</th>
                                <th rowspan="2" style="padding: 30px;">Bukan Pengguna Listrik</th>
                                <th rowspan=" 2" style="padding: 30px;">Aksi</th>
                            </tr>
                            <tr>
                                <th>PLN</th>
                                <th>Non PLN</th>
                                <th>Jumlah</th>
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
                    Tambah Energi
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
                    Edit Energi
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
                url: "{{ url('/statistik-menu/energi') }}",
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
                    data: 'pln',
                    name: 'pln'
                },
                {
                    data: 'non_pln',
                    name: 'non_pln'
                },
                {
                    data: 'pln_jumlah',
                    name: 'pln_jumlah'
                },
                {
                    data: 'non_listrik',
                    name: 'non_listrik'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA ENERGI
    $(document).on('click', '.energiTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/energi/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonEnergi', function(e) {
        e.preventDefault()
        let formEnergi = $('.formInsertEnergi')[0]
        const formDataEnergi = new FormData(formEnergi)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#plnError').addClass('d-none')
        $('#non_plnError').addClass('d-none')
        $('#pln_jumlahError').addClass('d-none')
        $('#non_listrikError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/energi') }}",
            method: "POST",
            data: formDataEnergi,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "JSON",
            success: function(response) {
                $('.formInsertEnergi').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Energi Berhasil Disimpan!',
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
                        $('#pln').removeClass('is-valid')
                        $('#pln').addClass('is-invalid')
                        $('#non_pln').removeClass('is-valid')
                        $('#non_pln').addClass('is-invalid')
                        $('#pln_jumlah').removeClass('is-valid')
                        $('#pln_jumlah').addClass('is-invalid')
                        $('#non_listrik').removeClass('is-valid')
                        $('#non_listrik').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA ENERGI
    $(document).on('click', '.energiEdit', function(e) {
        e.preventDefault()
        const idEnergi = $(this).attr('idEnergiEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/energi/${idEnergi}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonEnergi', function(e) {
        e.preventDefault()
        const formEnergiId = $('input[id=id_energi]').val()
        const formEnergi = $('.formEditEnergi')[0]
        const formDataEnergi = new FormData(formEnergi)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#plnError').addClass('d-none')
        $('#non_plnError').addClass('d-none')
        $('#pln_jumlahError').addClass('d-none')
        $('#non_listrikError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/energi/${formEnergiId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataEnergi,
            dataType: 'JSON',
            success: function(response) {
                $('.formEditEnergi').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Energi Berhasil Diedit!`,
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
                        $('#pln').removeClass('is-valid')
                        $('#pln').addClass('is-invalid')
                        $('#non_pln').removeClass('is-valid')
                        $('#non_pln').addClass('is-invalid')
                        $('#pln_jumlah').removeClass('is-valid')
                        $('#pln_jumlah').addClass('is-invalid')
                        $('#non_listrik').removeClass('is-valid')
                        $('#non_listrik').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //HAPUS DATA ENERGI
    $(document).on('click', '.energiHapus', function(e) {
        e.preventDefault()
        const idEnergi = $(this).attr('idEnergiHapus')
        const tahunEnergi = $(this).attr('tahunEnergi')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Energi Desa ${namaDesa} Tahun ${tahunEnergi} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/energi/${idEnergi}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idEnergi,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Energi Desa ${namaDesa} Tahun ${tahunEnergi} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Energi Gagal Dihapus!`,
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