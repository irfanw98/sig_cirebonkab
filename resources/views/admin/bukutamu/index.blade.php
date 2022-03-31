@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Buku Tamu')

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
                <h3>Buku Tamu</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Buku Tamu</li>
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
                    <table id="datatable" class="table table-bordered table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 20px;" width="5%">No</th>
                                <th style="padding: 20px;" width="20%">Nama Lengkap</th>
                                <th style="padding: 20px;">Email</th>
                                <th style="padding: 20px;">Nomor Telp</th>
                                <th style="padding: 20px;">Terkirim</th>
                                <th style="padding: 20px;" width="10%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal Detail Desa -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">
                    Pesan Bukutamu
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
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/bukutamu-menu') }}",
                type: "GET",
                dataType: "JSON"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'email',
                    name: 'email',
                    render: function(data, type, full, meta) {
                        return `<a href="mailto:${data}" target="_blank">${data}</a>`;
                    },
                },
                {
                    data: 'nomor_tlp',
                    name: 'nomor_tlp'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            'columnDefs': [{
                "targets": [0, 4, 5],
                "className": "text-center",
            }],
        })
    })

    $(document).on('click', '.pesanDetail', function(e) {
        e.preventDefault()
        const idPesan = $(this).attr('idDetailPesan')

        $.ajax({
            url: `{{ url('/bukutamu-menu/${idPesan}') }}`,
            method: "GET",
            success: function(result) {
                $('#detailModal').modal('show')
                $('#detailModal').find('.modal-body').html(result)
            }
        })
    })

    $(document).on('click', '.bukutamuHapus', function(e) {
        e.preventDefault()
        const idBukutamu = $(this).attr('idBukutamuHapus')
        const namaLengkap = $(this).attr('nama_lengkap')

        Swal.fire({
            title: 'Yakin?',
            text: `Data ${namaLengkap} akan dihapus dari buku tamu?`,
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
                    url: `{{ url('/bukutamu-menu/${idBukutamu}') }}`,
                    type: "POST",
                    data: {
                        multi: null,
                        '_method': 'DELETE',
                        'id': idBukutamu,
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: `Data ${namaLengkap} Berhasil Dihapus Dari Buku Tamu!`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        $('#datatable').DataTable().ajax.reload()

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: `Data Buku Tamu Gagal Dihapus!`,
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