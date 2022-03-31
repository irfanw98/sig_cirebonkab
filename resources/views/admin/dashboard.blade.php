@extends('template.master')

@section('title', 'SIG Kabupaten Cirebon | Dashboard')

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
        <h3>Dashboard</h3>
      </div>
      <div class="col-sm-6">

      </div>
    </div>
  </div>
</section>
@endsection

@section('content')
 <div class="row">
    <div class="col-lg-4 col-md-4">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $kecamatan }}</h3>
          <p>Kecamatan</p>
        </div>
        <div class="icon" style="color: #fff;">
          <i class="fas fa-map"></i>
        </div>
        <a href="{{ url('/kecamatan-menu') }}" class="small-box-footer">
          Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-4 col-md-4">
      <div class="small-box bg-warning">
        <div class="inner" style="color: #fff;">
          <h3>{{ $desa }}<sup style="font-size: 20px"></sup></h3>
          <p>Desa</p>
        </div>
        <div class="icon" style="color: #fff;">
          <i class="fas fa-map-marked-alt"></i>
        </div>
        <a href="{{ url('/desa-menu') }}" class="small-box-footer">
          <span style="color: #fff;">Selengkapnya</span> <i class="fas fa-arrow-circle-right" style="color: #fff;"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-4 col-md-4">
      <div class="small-box bg-info">
        <div class="inner" style="color: #fff;">
          <h3>{{ $bukutamu }}<sup style="font-size: 20px"></sup></h3>
          <p>Buku Tamu</p>
        </div>
        <div class="icon" style="color: #fff;">
          <i class="fas fa-book"></i>
        </div>
        <a href="{{ url('/desa-menu') }}" class="small-box-footer">
          <span style="color: #fff;">Selengkapnya</span> <i class="fas fa-arrow-circle-right" style="color: #fff;"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">  
                <!-- Jumlah Semua Buku Tamu Perbulan -->
                <h5 class="text-center" style="font-weight: 700;">Jumlah Buku Tamu Perbulan</h5>
                <canvas id="chartBukuTamu" width="100%"></canvas>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  const bukuTamu = document.getElementById('chartBukuTamu');
  const chartBukuTamu = new Chart(bukuTamu, {
      type: 'line',
      data: {
          labels: [
            @foreach($bukutamuPerbulans as $bukutamu)
              '{{ $bukutamu->months }}',
            @endforeach
          ],
          datasets: [{
              label: 'Jumlah',
              data: [
                @foreach($bukutamuPerbulans as $bukutamu)
                  {{ $bukutamu->count }},
                @endforeach,
              ],
              backgroundColor: [
                  '#007BFF',
              ],
              borderWidth: 1
          }]
      },
     options: {
        scales: {
           y: {
              ticks: {
                  beginAtZero: true,
              },
          },
        },
      }
  });
</script>
@endsection