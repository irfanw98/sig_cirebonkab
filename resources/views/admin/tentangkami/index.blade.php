@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Tentang Kami')

@section('header')
<style>
    .grad {
        background-color: #ffc107;
        height: 4px;
        border-radius: 20px;
    }
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>
@endsection

@section('header-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <h3>Tentang Kami</h3>
            </div>
            <div class="col-md-6 p-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tentang Kami</li>
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
                    <table id="datatable" class="table table-bordered  table-striped nowrap" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="padding: 20px;">No</th>
                                <th style="padding: 20px;">Foto</th>
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">
                    Edit Tentang Kami
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

document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault()
})

$(document).ready(function() {
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('/tentangkami-menu') }}",
            type: "GET",
            dataType: "JSON"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'foto',
                name: 'foto',
                render: function(data, type, full, meta) {
                    return "<img src={{ asset('storage/tentangkami') }}/" + data + " width='120' height='100'/>";
                },
                orderable: false
            },
            {
                data: 'aksi',
                name: 'aksi'
            }
        ],
        'columnDefs': [{
            "targets": [0, 1, 2],
            "className": "text-center",
        }],
    })
})

$(document).on('click', '.tentangkamiEdit', function(e) {
    e.preventDefault()
    const idTentangkami = $(this).attr('idTentangkamiEdit')

    $.ajax({
        url: `{{ url('/tentangkami-menu/${idTentangkami}/edit') }}`,
        method: "GET",
        success: function(result) {
            $('#editModal').modal('show')
            $('#editModal').find('.modal-body').html(result)
        }
    })
})

$(document).on('click', '.editButtonTentangkami', function(e) {
    e.preventDefault()
    const formTentangkamiId = $('input[id=id_tentang_kami]').val()
    const formTentangkami = $('.formEditTentangkami')[0]
    const formDataTentangkami = new FormData(formTentangkami)

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `{{ url('/tentangkami-menu/${formTentangkamiId}') }}`,
        method: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        data: formDataTentangkami,
        dataType: 'JSON',
        success: function(response) {
            $('.formEditTentangkami').trigger('reset')
            $('#editModal').modal('hide')
            $("#datatable").DataTable().ajax.reload()

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: `Data Tentangkami Berhasil Diedit!`,
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
})
</script>
@endsection