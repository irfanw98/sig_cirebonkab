@extends('frontend_master')

@section('header')
<link rel="stylesheet" href="{{ asset('css/frontend/bukutamu/style.css') }}">
@endsection

@section('content')
<section class="bukutamu">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="grad">
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-around">
                            <div class="col-sm-6 col-md-6 col-lg-5 align-items-center img-bukutamu">
                                <div class="bukutamu__img">
                                    <img src="{{ asset('img/sendMessage.svg') }}" class="img-fluid" alt="bukutamu-img">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 bukutamu-form">
                                <form action="" method="post" class="formBukuTamu">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap">

                                        <span class="text-danger" id="nama_lengkapError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan Email">

                                        <span class="text-danger" id="emailError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_tlp">Nomor Telepon</label>
                                        <input type="text" id="nomor_tlp" class="form-control" name="nomor_tlp" placeholder="Masukkan Nomor Telepon">

                                        <span class="text-danger" id="nomor_tlpError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="pesan">Pesan</label>
                                        <textarea id="pesan" class="form-control" rows="4" name="pesan" placeholder="Masukkan Pesan"></textarea>

                                        <span class="text-danger" id="pesanError"></span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary sendBukuTamu"><i class="fas fa-paper-plane"></i> Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.sendBukuTamu').on('click', function(e) {
            e.preventDefault()
            let formBukuTamu = $('.formBukuTamu')[0]
            const formData = new FormData(formBukuTamu)

             $.ajax({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('/buku-tamu') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    const Toast = Swal.mixin({
                      toast: true,
                      position: 'top',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                    Toast.fire({
                      icon: 'success',
                      title: 'Pesan Berhasil Dikirim.'
                    })
                    
                    $('.formBukuTamu').trigger('reset')

                },
                error: function(data) {
                    let errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function(key, value) {
                            let errID = '#' + key + 'Error'
                            $('#nama_lengkap').removeClass('is-valid')
                            $('#nama_lengkap').addClass('is-invalid')
                            $('#email').removeClass('is-valid')
                            $('#email').addClass('is-invalid')
                            $('#nomor_tlp').removeClass('is-valid')
                            $('#nomor_tlp').addClass('is-invalid')
                            $('#pesan').removeClass('is-valid')
                            $('#pesan').addClass('is-invalid')
                            $(errID).removeClass('d-none')
                            $(errID).text(value)
                        })
                    } 
                }
            })
        })
    })
</script>
@endsection