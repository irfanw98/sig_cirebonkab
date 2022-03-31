@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/style.css') }}">
@endsection

@section('content')
<!-- Konten Statistik -->
<section class="konten-statistik">
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12 col-lg-12 text-center title">
        <h2>Statistik <span>{{ $desa->nama_desa }}</span></h2>
        <p class="section-line"></p>
      </div>
    </div>
    <div class="row mt-5 mb-5">
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/geografi') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/geografi.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Geografi</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/pemerintahan') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/pemerintahan.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Pemerintahan</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/penduduk') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/penduduk.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Penduduk</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/sosial') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/sosial.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Sosial</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/pertanian') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/pertanian.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Pertanian</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/energi') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/energi.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Energi</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/perdagangan') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/perdagangan.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Perdagangan</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/transportasi') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/transportasi.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Transportasi</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4 statistik">
        <a href="{{ url('/statistik/keuangan') }}/{{ $desa->id_desa }}">
          <div class="card sevice-card">
            <div class="service-card__img">
              <img src="{{ asset('img/keuangan.png') }}">
            </div>
            <div class="card-body">
              <h5 class="card-title">Keuangan</h5>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- End Konten Statistik -->
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection