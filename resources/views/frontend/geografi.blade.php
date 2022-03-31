@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/geografi/style.css') }}">
@endsection

@section('content')
<section class="geografi">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradGeografi">
                    </div>
                    <div class="card-body geografi-content">
                        <h5>GEOGRAFI<br><span>Geography</span></h5><br>
                        <p class="title">Luas Daerah Menurut Desa {{ $desa->nama_desa }} dan Ketinggian di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-6 col-lg-5 mb-4">
                              <p class="mt-3">Luas (Km<sup>2</sup>)</p>
                                <canvas id="chartLuas"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-5">
                              <p class="mt-3">Ketinggian (m)</p>
                              <canvas id="chartKetinggian"></canvas>
                            </div>
                        </div>
                        <p class="title">Jarak Dari Desa {{ $desa->nama_desa }} Ke Kabupaten dan Kecamatan Serta Jarak Antar Desa di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-6 col-lg-5 mb-5">
                              <p class="mt-3">Jarak Kecamatan (Km)</p>
                              <canvas id="chartJarakKecamatan"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-5">
                              <p class="mt-3">Jarak Kabupaten (m)</p>
                              <canvas id="chartJarakKabupaten"></canvas>
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
//=====================================================GEOGRAFI=======================================//

//Luas
const luas = document.getElementById('chartLuas');
const chartLuas = new Chart(luas, {
    type: 'bar',
    data: {
        labels: [
          @foreach($geografis as $geografi)
            '{{ $geografi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Luas (Km)',
            data: [
              @foreach($geografis as $geografi)
                {{ $geografi->luas }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
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


//Ketinnggian
const ketinggian = document.getElementById('chartKetinggian');
const chartKetinggian = new Chart(ketinggian, {
    type: 'bar',
    data: {
        labels: [
          @foreach($geografis as $geografi)
            '{{ $geografi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Ketinggian (m)',
            data: [
              @foreach($geografis as $geografi)
                {{ $geografi->ketinggian }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
          y: {
            ticks: {
              stepSize: 1,
              beginAtZero: true,
            },
          },
        },
      }
});


//Jarak Kecamatan
const jarakKecamatan = document.getElementById('chartJarakKecamatan');
const chartJarakKecamatan = new Chart(jarakKecamatan, {
    type: 'bar',
    data: {
        labels: [
          @foreach($geografis as $geografi)
            '{{ $geografi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jarak Kecamatan (Km)',
            data: [
              @foreach($geografis as $geografi)
                {{ $geografi->jarak_kecamatan }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
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


//Jarak Kabupaten
const jarakKabupaten = document.getElementById('chartJarakKabupaten');
const chartJarakKabupaten = new Chart(jarakKabupaten, {
    type: 'bar',
    data: {
        labels: [
          @foreach($geografis as $geografi)
            '{{ $geografi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jarak Kabupaten (Km)',
            data: [
              @foreach($geografis as $geografi)
                {{ $geografi->jarak_kabupaten }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
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
