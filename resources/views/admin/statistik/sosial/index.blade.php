@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Statistik - Sosial')

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
                <h3>Sosial</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sosial</li>
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
                    <a href="" name="sosialTambah" class="btn btn-primary mb-3 p-2 sosialTambah" role="button" style="color: white;"><i class="fa fa-plus-square"></i> Tambah</a>
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th rowspan="2" style="padding: 30px;">No</th>
                                <th rowspan="2" style="padding: 30px;">Desa</th>
                                <th rowspan="2" style="padding: 30px;">Tahun</th>
                                <th colspan="3" class="text-center">Banyak Sekolah Dasar (SD)</th>
                                <th colspan="3" class="text-center">Banyak Madrasah Ibtidaiyah (MI)</th>
                                <th colspan="3" class="text-center">Banyak Sekolah Menengah Pertama (SMP)</th>
                                <th colspan="3" class="text-center">Banyak Madrasah Tsanawiyah (MTS)</th>
                                <th colspan="3" class="text-center">Banyak Sekolah Menengah Atas (SMA)</th>
                                <th colspan="3" class="text-center">Banyak Madrasah Aliyah (MA)</th>
                                <th colspan="3" class="text-center">Banyak Sekolah Menengah Kejuruan (SMK)</th>
                                <th colspan="3" class="text-center">Banyak Perguruan Tinggi</th>
                                <th colspan="8" class="text-center">Sarana Pendidikan Terdekat</th>
                                <th colspan="6" class="text-center">Banyak Sarana Kesehatan</th>
                                <th colspan="6" class="text-center">Sarana Kesehatan Terdekat</th>
                                <th rowspan="2" style="padding: 30px;">Gizi Buruk</th>
                                <th rowspan="2" style="padding: 30px;">Aksi</th>
                            </tr>
                            <tr>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>Negeri</th>
                                <th>Swasta</th>
                                <th>Jumlah</th>
                                <th>SD</th>
                                <th>MI</th>
                                <th>SMP</th>
                                <th>MTS</th>
                                <th>SMA</th>
                                <th>MA</th>
                                <th>SMK</th>
                                <th>Perguruan Tinggi</th>
                                <th>Rumah Sakit</th>
                                <th>Rumah Sakit Bersalin</th>
                                <th>Poliklinik/Balai Pengobatan</th>
                                <th>Rawat Inap</th>
                                <th>Tanpa Rawat Inap</th>
                                <th>Apotek</th>
                                <th>Rumah Sakit</th>
                                <th>Rumah Sakit Bersalin</th>
                                <th>Poliklinik/Balai Pengobatan</th>
                                <th>Rawat Inap</th>
                                <th>Tanpa Rawat Inap</th>
                                <th>Apotek</th>
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
                    Tambah Sosial
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
                    Edit Sosial
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
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": "{{ url('/statistik-menu/sosial-menu') }}",
                "type": "POST"
            },
            "columns": [{
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
                    data: 'sd_negeri',
                    name: 'sd_negeri'
                },
                {
                    data: 'sd_swasta',
                    name: 'sd_swasta'
                },
                {
                    data: 'sd_jumlah',
                    name: 'sd_jumlah'
                },
                {
                    data: 'mi_negeri',
                    name: 'mi_negeri'
                },
                {
                    data: 'mi_swasta',
                    name: 'mi_swasta'
                },
                {
                    data: 'mi_jumlah',
                    name: 'mi_jumlah'
                },
                {
                    data: 'smp_negeri',
                    name: 'smp_negeri'
                },
                {
                    data: 'smp_swasta',
                    name: 'smp_swasta'
                },
                {
                    data: 'smp_jumlah',
                    name: 'smp_jumlah'
                },
                {
                    data: 'mts_negeri',
                    name: 'mts_negeri'
                },
                {
                    data: 'mts_swasta',
                    name: 'mts_swasta'
                },
                {
                    data: 'mts_jumlah',
                    name: 'mts_jumlah'
                },
                {
                    data: 'sma_negeri',
                    name: 'sma_negeri'
                },
                {
                    data: 'sma_swasta',
                    name: 'sma_swasta'
                },
                {
                    data: 'sma_jumlah',
                    name: 'sma_jumlah'
                },
                {
                    data: 'ma_negeri',
                    name: 'ma_negeri'
                },
                {
                    data: 'ma_swasta',
                    name: 'ma_swasta'
                },
                {
                    data: 'ma_jumlah',
                    name: 'ma_jumlah'
                },
                {
                    data: 'smk_negeri',
                    name: 'smk_negeri'
                },
                {
                    data: 'smk_swasta',
                    name: 'smk_swasta'
                },
                {
                    data: 'smk_jumlah',
                    name: 'smk_jumlah'
                },
                {
                    data: 'pt_negeri',
                    name: 'pt_negeri'
                },
                {
                    data: 'pt_swasta',
                    name: 'pt_swasta'
                },
                {
                    data: 'pt_jumlah',
                    name: 'pt_jumlah'
                },
                {
                    data: 'sarana_sd',
                    name: 'sarana_sd'
                },
                {
                    data: 'sarana_mi',
                    name: 'sarana_mi'
                },
                {
                    data: 'sarana_smp',
                    name: 'sarana_smp'
                },
                {
                    data: 'sarana_mts',
                    name: 'sarana_mts'
                },
                {
                    data: 'sarana_sma',
                    name: 'sarana_sma'
                },
                {
                    data: 'sarana_ma',
                    name: 'sarana_ma'
                },
                {
                    data: 'sarana_smk',
                    name: 'sarana_smk'
                },
                {
                    data: 'sarana_pt',
                    name: 'sarana_pt'
                },
                {
                    data: 'sarana_rs',
                    name: 'sarana_rs'
                },
                {
                    data: 'sarana_rs_bersalin',
                    name: 'sarana_rs_bersalin'
                },
                {
                    data: 'sarana_poliklinik',
                    name: 'sarana_poliklinik'
                },
                {
                    data: 'sarana_rawat_inap',
                    name: 'sarana_rawat_inap'
                },
                {
                    data: 'sarana_tanpa_rawat_inap',
                    name: 'sarana_tanpa_rawat_inap'
                },
                {
                    data: 'sarana_apotek',
                    name: 'sarana_apotek'
                },
                {
                    data: 'kemudahan_rs',
                    name: 'kemudahan_rs'
                },
                {
                    data: 'kemudahan_rs_bersalin',
                    name: 'kemudahan_rs_bersalin'
                },
                {
                    data: 'kemudahan_poliklinik',
                    name: 'kemudahan_poliklinik'
                },
                {
                    data: 'kemudahan_rawat_inap',
                    name: 'kemudahan_rawat_inap'
                },
                {
                    data: 'kemudahan_tanpa_rawat_inap',
                    name: 'kemudahan_tanpa_rawat_inap'
                },
                {
                    data: 'kemudahan_apotek',
                    name: 'kemudahan_apotek'
                },
                {
                    data: 'gizi_buruk',
                    name: 'gizi_buruk'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48],
                "className": "text-center",
            }],
        })
    })

    //TAMBAH DATA SOSIAL
    $(document).on('click', '.sosialTambah', function(e) {
        e.preventDefault()

        $.ajax({
            url: "{{ url('/statistik-menu/sosial/create') }}",
            method: "GET",
            success: function(result) {
                $('#tambahModal').modal('show')
                $('#tambahModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.saveButtonSosial', function(e) {
        e.preventDefault()
        let formSosial = $('.formInsertSosial')[0]
        const formDataSosial = new FormData(formSosial)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#sd_negeriError').addClass('d-none')
        $('#sd_swastaError').addClass('d-none')
        $('#sd_jumlahError').addClass('d-none')
        $('#mi_negeriError').addClass('d-none')
        $('#mi_swastaError').addClass('d-none')
        $('#mi_jumlahError').addClass('d-none')
        $('#smp_negeriError').addClass('d-none')
        $('#smp_swastaError').addClass('d-none')
        $('#smp_jumlahError').addClass('d-none')
        $('#mts_negeriError').addClass('d-none')
        $('#mts_swastaError').addClass('d-none')
        $('#mts_jumlahError').addClass('d-none')
        $('#sma_negeriError').addClass('d-none')
        $('#sma_swastaError').addClass('d-none')
        $('#sma_jumlahError').addClass('d-none')
        $('#ma_negeriError').addClass('d-none')
        $('#ma_swastaError').addClass('d-none')
        $('#ma_jumlahError').addClass('d-none')
        $('#smk_negeriError').addClass('d-none')
        $('#smk_swastaError').addClass('d-none')
        $('#smk_jumlahError').addClass('d-none')
        $('#pt_negeriError').addClass('d-none')
        $('#pt_swastaError').addClass('d-none')
        $('#pt_jumlahError').addClass('d-none')
        $('#sarana_sdError').addClass('d-none')
        $('#sarana_miError').addClass('d-none')
        $('#sarana_smpError').addClass('d-none')
        $('#sarana_mtsError').addClass('d-none')
        $('#sarana_smaError').addClass('d-none')
        $('#sarana_maError').addClass('d-none')
        $('#sarana_smkError').addClass('d-none')
        $('#sarana_ptError').addClass('d-none')
        $('#sarana_rsError').addClass('d-none')
        $('#sarana_rs_bersalinError').addClass('d-none')
        $('#sarana_poliklinikError').addClass('d-none')
        $('#sarana_rawat_inapError').addClass('d-none')
        $('#sarana_tanpa_rawat_inapError').addClass('d-none')
        $('#sarana_apotekError').addClass('d-none')
        $('#kemudahan_rsError').addClass('d-none')
        $('#kemudahan_rs_bersalinError').addClass('d-none')
        $('#kemudahan_poliklinikError').addClass('d-none')
        $('#kemudahan_rawat_inapError').addClass('d-none')
        $('#kemudahan_tanpa_rawat_inapError').addClass('d-none')
        $('#kemudahan_apotekError').addClass('d-none')
        $('#gizi_burukError').addClass('d-none')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/statistik-menu/sosial') }}",
            method: "POST",
            data: formDataSosial,
            contentType: false,
            processData: false,
            cache: false,
            success: function(response) {
                $('.formInsertSosial').trigger('reset');
                $('#tambahModal').modal('hide');
                $("#datatable").DataTable().ajax.reload();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Sosial Berhasil Disimpan!',
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
                        $('#sd_negeri').removeClass('is-valid')
                        $('#sd_negeri').addClass('is-invalid')
                        $('#sd_swasta').removeClass('is-valid')
                        $('#sd_swasta').addClass('is-invalid')
                        $('#sd_jumlah').removeClass('is-valid')
                        $('#sd_jumlah').addClass('is-invalid')
                        $('#mi_negeri').removeClass('is-valid')
                        $('#mi_negeri').addClass('is-invalid')
                        $('#mi_swasta').removeClass('is-valid')
                        $('#mi_swasta').addClass('is-invalid')
                        $('#mi_jumlah').removeClass('is-valid')
                        $('#mi_jumlah').addClass('is-invalid')
                        $('#smp_negeri').removeClass('is-valid')
                        $('#smp_negeri').addClass('is-invalid')
                        $('#smp_swasta').removeClass('is-valid')
                        $('#smp_swasta').addClass('is-invalid')
                        $('#smp_jumlah').removeClass('is-valid')
                        $('#smp_jumlah').addClass('is-invalid')
                        $('#mts_negeri').removeClass('is-valid')
                        $('#mts_negeri').addClass('is-invalid')
                        $('#mts_swasta').removeClass('is-valid')
                        $('#mts_swasta').addClass('is-invalid')
                        $('#mts_jumlah').removeClass('is-valid')
                        $('#mts_jumlah').addClass('is-invalid')
                        $('#sma_negeri').removeClass('is-valid')
                        $('#sma_negeri').addClass('is-invalid')
                        $('#sma_swasta').removeClass('is-valid')
                        $('#sma_swasta').addClass('is-invalid')
                        $('#sma_jumlah').removeClass('is-valid')
                        $('#sma_jumlah').addClass('is-invalid')
                        $('#ma_negeri').removeClass('is-valid')
                        $('#ma_negeri').addClass('is-invalid')
                        $('#ma_swasta').removeClass('is-valid')
                        $('#ma_swasta').addClass('is-invalid')
                        $('#ma_jumlah').removeClass('is-valid')
                        $('#ma_jumlah').addClass('is-invalid')
                        $('#smk_negeri').removeClass('is-valid')
                        $('#smk_negeri').addClass('is-invalid')
                        $('#smk_swasta').removeClass('is-valid')
                        $('#smk_swasta').addClass('is-invalid')
                        $('#smk_jumlah').removeClass('is-valid')
                        $('#smk_jumlah').addClass('is-invalid')
                        $('#pt_negeri').removeClass('is-valid')
                        $('#pt_negeri').addClass('is-invalid')
                        $('#pt_swasta').removeClass('is-valid')
                        $('#pt_swasta').addClass('is-invalid')
                        $('#pt_jumlah').removeClass('is-valid')
                        $('#pt_jumlah').addClass('is-invalid')
                        $('#sarana_sd').removeClass('is-valid')
                        $('#sarana_sd').addClass('is-invalid')
                        $('#sarana_mi').removeClass('is-valid')
                        $('#sarana_mi').addClass('is-invalid')
                        $('#sarana_smp').removeClass('is-valid')
                        $('#sarana_smp').addClass('is-invalid')
                        $('#sarana_mts').removeClass('is-valid')
                        $('#sarana_mts').addClass('is-invalid')
                        $('#sarana_sma').removeClass('is-valid')
                        $('#sarana_sma').addClass('is-invalid')
                        $('#sarana_ma').removeClass('is-valid')
                        $('#sarana_ma').addClass('is-invalid')
                        $('#sarana_smk').removeClass('is-valid')
                        $('#sarana_smk').addClass('is-invalid')
                        $('#sarana_pt').removeClass('is-valid')
                        $('#sarana_pt').addClass('is-invalid')
                        $('#sarana_rs').removeClass('is-valid')
                        $('#sarana_rs').addClass('is-invalid')
                        $('#sarana_rs_bersalin').removeClass('is-valid')
                        $('#sarana_rs_bersalin').addClass('is-invalid')
                        $('#sarana_poliklinik').removeClass('is-valid')
                        $('#sarana_poliklinik').addClass('is-invalid')
                        $('#sarana_rawat_inap').removeClass('is-valid')
                        $('#sarana_rawat_inap').addClass('is-invalid')
                        $('#sarana_tanpa_rawat_inap').removeClass('is-valid')
                        $('#sarana_tanpa_rawat_inap').addClass('is-invalid')
                        $('#sarana_apotek').removeClass('is-valid')
                        $('#sarana_apotek').addClass('is-invalid')
                        $('#kemudahan_rs').removeClass('is-valid')
                        $('#kemudahan_rs').addClass('is-invalid')
                        $('#kemudahan_rs_bersalin').removeClass('is-valid')
                        $('#kemudahan_rs_bersalin').addClass('is-invalid')
                        $('#kemudahan_poliklinik').removeClass('is-valid')
                        $('#kemudahan_poliklinik').addClass('is-invalid')
                        $('#kemudahan_rawat_inap').removeClass('is-valid')
                        $('#kemudahan_rawat_inap').addClass('is-invalid')
                        $('#kemudahan_tanpa_rawat_inap').removeClass('is-valid')
                        $('#kemudahan_tanpa_rawat_inap').addClass('is-invalid')
                        $('#kemudahan_apotek').removeClass('is-valid')
                        $('#kemudahan_apotek').addClass('is-invalid')
                        $('#gizi_buruk').removeClass('is-valid')
                        $('#gizi_buruk').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //EDIT DATA SOSIAL
    $(document).on('click', '.sosialEdit', function(e) {
        e.preventDefault()
        const idSosial = $(this).attr('idSosialEdit')

        $.ajax({
            url: `{{ url('/statistik-menu/sosial/${idSosial}/edit') }}`,
            method: "GET",
            success: function(result) {
                $('#editModal').modal('show')
                $('#editModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.editButtonSosial', function(e) {
        e.preventDefault()
        const formSosialId = $('input[id=id_sosial]').val()
        const formSosial = $('.formEditSosial')[0]
        const formDataSosial = new FormData(formSosial)

        $('#id_desaError').addClass('d-none')
        $('#tahunError').addClass('d-none')
        $('#sd_negeriError').addClass('d-none')
        $('#sd_swastaError').addClass('d-none')
        $('#sd_jumlahError').addClass('d-none')
        $('#mi_negeriError').addClass('d-none')
        $('#mi_swastaError').addClass('d-none')
        $('#mi_jumlahError').addClass('d-none')
        $('#smp_negeriError').addClass('d-none')
        $('#smp_swastaError').addClass('d-none')
        $('#smp_jumlahError').addClass('d-none')
        $('#mts_negeriError').addClass('d-none')
        $('#mts_swastaError').addClass('d-none')
        $('#mts_jumlahError').addClass('d-none')
        $('#sma_negeriError').addClass('d-none')
        $('#sma_swastaError').addClass('d-none')
        $('#sma_jumlahError').addClass('d-none')
        $('#ma_negeriError').addClass('d-none')
        $('#ma_swastaError').addClass('d-none')
        $('#ma_jumlahError').addClass('d-none')
        $('#smk_negeriError').addClass('d-none')
        $('#smk_swastaError').addClass('d-none')
        $('#smk_jumlahError').addClass('d-none')
        $('#pt_negeriError').addClass('d-none')
        $('#pt_swastaError').addClass('d-none')
        $('#pt_jumlahError').addClass('d-none')
        $('#sarana_sdError').addClass('d-none')
        $('#sarana_miError').addClass('d-none')
        $('#sarana_smpError').addClass('d-none')
        $('#sarana_mtsError').addClass('d-none')
        $('#sarana_smaError').addClass('d-none')
        $('#sarana_maError').addClass('d-none')
        $('#sarana_smkError').addClass('d-none')
        $('#sarana_ptError').addClass('d-none')
        $('#sarana_rsError').addClass('d-none')
        $('#sarana_rs_bersalinError').addClass('d-none')
        $('#sarana_poliklinikError').addClass('d-none')
        $('#sarana_rawat_inapError').addClass('d-none')
        $('#sarana_tanpa_rawat_inapError').addClass('d-none')
        $('#sarana_apotekError').addClass('d-none')
        $('#kemudahan_rsError').addClass('d-none')
        $('#kemudahan_rs_bersalinError').addClass('d-none')
        $('#kemudahan_poliklinikError').addClass('d-none')
        $('#kemudahan_rawat_inapError').addClass('d-none')
        $('#kemudahan_tanpa_rawat_inapError').addClass('d-none')
        $('#kemudahan_apotekError').addClass('d-none')
        $('#gizi_burukError').addClass('d-none')


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/statistik-menu/sosial/${formSosialId}') }}`,
            method: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formDataSosial,
            success: function(response) {
                $('.formEditSosial').trigger('reset')
                $('#editModal').modal('hide')
                $("#datatable").DataTable().ajax.reload()

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Data Sosial Berhasil Diedit!`,
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
                        $('#sd_negeri').removeClass('is-valid')
                        $('#sd_negeri').addClass('is-invalid')
                        $('#sd_swasta').removeClass('is-valid')
                        $('#sd_swasta').addClass('is-invalid')
                        $('#sd_jumlah').removeClass('is-valid')
                        $('#sd_jumlah').addClass('is-invalid')
                        $('#mi_negeri').removeClass('is-valid')
                        $('#mi_negeri').addClass('is-invalid')
                        $('#mi_swasta').removeClass('is-valid')
                        $('#mi_swasta').addClass('is-invalid')
                        $('#mi_jumlah').removeClass('is-valid')
                        $('#mi_jumlah').addClass('is-invalid')
                        $('#smp_negeri').removeClass('is-valid')
                        $('#smp_negeri').addClass('is-invalid')
                        $('#smp_swasta').removeClass('is-valid')
                        $('#smp_swasta').addClass('is-invalid')
                        $('#smp_jumlah').removeClass('is-valid')
                        $('#smp_jumlah').addClass('is-invalid')
                        $('#mts_negeri').removeClass('is-valid')
                        $('#mts_negeri').addClass('is-invalid')
                        $('#mts_swasta').removeClass('is-valid')
                        $('#mts_swasta').addClass('is-invalid')
                        $('#mts_jumlah').removeClass('is-valid')
                        $('#mts_jumlah').addClass('is-invalid')
                        $('#sma_negeri').removeClass('is-valid')
                        $('#sma_negeri').addClass('is-invalid')
                        $('#sma_swasta').removeClass('is-valid')
                        $('#sma_swasta').addClass('is-invalid')
                        $('#sma_jumlah').removeClass('is-valid')
                        $('#sma_jumlah').addClass('is-invalid')
                        $('#ma_negeri').removeClass('is-valid')
                        $('#ma_negeri').addClass('is-invalid')
                        $('#ma_swasta').removeClass('is-valid')
                        $('#ma_swasta').addClass('is-invalid')
                        $('#ma_jumlah').removeClass('is-valid')
                        $('#ma_jumlah').addClass('is-invalid')
                        $('#smk_negeri').removeClass('is-valid')
                        $('#smk_negeri').addClass('is-invalid')
                        $('#smk_swasta').removeClass('is-valid')
                        $('#smk_swasta').addClass('is-invalid')
                        $('#smk_jumlah').removeClass('is-valid')
                        $('#smk_jumlah').addClass('is-invalid')
                        $('#pt_negeri').removeClass('is-valid')
                        $('#pt_negeri').addClass('is-invalid')
                        $('#pt_swasta').removeClass('is-valid')
                        $('#pt_swasta').addClass('is-invalid')
                        $('#pt_jumlah').removeClass('is-valid')
                        $('#pt_jumlah').addClass('is-invalid')
                        $('#sarana_sd').removeClass('is-valid')
                        $('#sarana_sd').addClass('is-invalid')
                        $('#sarana_mi').removeClass('is-valid')
                        $('#sarana_mi').addClass('is-invalid')
                        $('#sarana_smp').removeClass('is-valid')
                        $('#sarana_smp').addClass('is-invalid')
                        $('#sarana_mts').removeClass('is-valid')
                        $('#sarana_mts').addClass('is-invalid')
                        $('#sarana_sma').removeClass('is-valid')
                        $('#sarana_sma').addClass('is-invalid')
                        $('#sarana_ma').removeClass('is-valid')
                        $('#sarana_ma').addClass('is-invalid')
                        $('#sarana_smk').removeClass('is-valid')
                        $('#sarana_smk').addClass('is-invalid')
                        $('#sarana_pt').removeClass('is-valid')
                        $('#sarana_pt').addClass('is-invalid')
                        $('#sarana_rs').removeClass('is-valid')
                        $('#sarana_rs').addClass('is-invalid')
                        $('#sarana_rs_bersalin').removeClass('is-valid')
                        $('#sarana_rs_bersalin').addClass('is-invalid')
                        $('#sarana_poliklinik').removeClass('is-valid')
                        $('#sarana_poliklinik').addClass('is-invalid')
                        $('#sarana_rawat_inap').removeClass('is-valid')
                        $('#sarana_rawat_inap').addClass('is-invalid')
                        $('#sarana_tanpa_rawat_inap').removeClass('is-valid')
                        $('#sarana_tanpa_rawat_inap').addClass('is-invalid')
                        $('#sarana_apotek').removeClass('is-valid')
                        $('#sarana_apotek').addClass('is-invalid')
                        $('#kemudahan_rs').removeClass('is-valid')
                        $('#kemudahan_rs').addClass('is-invalid')
                        $('#kemudahan_rs_bersalin').removeClass('is-valid')
                        $('#kemudahan_rs_bersalin').addClass('is-invalid')
                        $('#kemudahan_poliklinik').removeClass('is-valid')
                        $('#kemudahan_poliklinik').addClass('is-invalid')
                        $('#kemudahan_rawat_inap').removeClass('is-valid')
                        $('#kemudahan_rawat_inap').addClass('is-invalid')
                        $('#kemudahan_tanpa_rawat_inap').removeClass('is-valid')
                        $('#kemudahan_tanpa_rawat_inap').addClass('is-invalid')
                        $('#kemudahan_apotek').removeClass('is-valid')
                        $('#kemudahan_apotek').addClass('is-invalid')
                        $('#gizi_buruk').removeClass('is-valid')
                        $('#gizi_buruk').addClass('is-invalid')
                        $(errID).removeClass('d-none')
                        $(errID).text(value)
                    })
                }
            }
        })
    })

    //HAPUS DATA SOSIAL
    $(document).on('click', '.sosialHapus', function(e) {
        e.preventDefault()
        const idSosial = $(this).attr('idSosialHapus')
        const tahunSosial = $(this).attr('tahunSosial')
        const namaDesa = $(this).attr('namaDesa')

        Swal.fire({
            title: 'Yakin?',
            text: `Data Sosial Desa ${namaDesa} Tahun ${tahunSosial} Akan Dihapus?`,
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
                    url: `{{ url('/statistik-menu/sosial/${idSosial}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idSosial,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data Sosial Desa ${namaDesa} Tahun ${tahunSosial} Berhasil Dihapus!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Sosial Gagal Dihapus!`,
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