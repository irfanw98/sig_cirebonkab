@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/penduduk/style.css') }}">
@endsection

@section('content')
<section class="penduduk">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradPenduduk">
                    </div>
                    <div class="card-body penduduk-content">
                        <h5>PENDUDUK<br><span>Population</span></h5><br>
                        <p class="title">Penduduk, Laju Pertumbuhan Penduduk, Distribusi Persentase Penduduk, Kepadatan Penduduk, Rasio Jenis Kelamin Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-around mt-5">
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Penduduk (jiwa)<sup>1</sup></p>
                              <canvas id="chartPenduduk"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Laju Pertumbuhan Penduduk per Tahun</p>
                              <canvas id="chartLajuPenduduk"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Persentase Penduduk</p>
                              <canvas id="chartPersentasePenduduk"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Kepadatan Penduduk (per km<sup>2</sup>)<sup>4</sup></p>
                              <canvas id="chartKepadatanPenduduk"></canvas>
                            </div>
                            <div class="col-md-12 col-lg-12 mt-3">
                              <p class="mt-3">Rasio Jenis Kelamin</p>
                              <canvas id="chartRasioJk"></canvas>
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

const penduduk = document.getElementById('chartPenduduk');
const chartPenduduk = new Chart(penduduk, {
    type: 'bar',
    data: {
        labels: [
          @foreach($penduduks as $penduduk)
            '{{ $penduduk->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jiwa',
            data: [
              @foreach($penduduks as $penduduk)
                {{ $penduduk->jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(95, 150, 198, 0.2)',
            ],
            borderColor: [
                'rgba(95, 150, 198, 1',
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

//Laju Pertumbuhan Penduduk
const lajuPenduduk = document.getElementById('chartLajuPenduduk');
const chartLajuPenduduk = new Chart(lajuPenduduk, {
    type: 'bar',
    data: {
        labels: [
          @foreach($penduduks as $penduduk)
            '{{ $penduduk->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Laju Pertumbuhan',
            data: [
              @foreach($penduduks as $penduduk)
                {{ $penduduk->laju }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(95, 150, 198, 0.2)',
            ],
            borderColor: [
                'rgba(95, 150, 198, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

//Persentase Penduduk
const persentasePenduduk = document.getElementById('chartPersentasePenduduk');
const chartPersentasePenduduk = new Chart(persentasePenduduk, {
    type: 'bar',
    data: {
        labels: [
          @foreach($penduduks as $penduduk)
            '{{ $penduduk->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Persentase',
            data: [
              @foreach($penduduks as $penduduk)
                {{ $penduduk->persentase }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(95, 150, 198, 0.2)',
            ],
            borderColor: [
                'rgba(95, 150, 198, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

//Kepadatan Penduduk
const kepadatanPenduduk = document.getElementById('chartKepadatanPenduduk');
const chartKepadatanPenduduk = new Chart(kepadatanPenduduk, {
    type: 'bar',
    data: {
        labels: [
          @foreach($penduduks as $penduduk)
            '{{ $penduduk->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Kepadatan',
            data: [
              @foreach($penduduks as $penduduk)
                {{ $penduduk->kepadatan }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(95, 150, 198, 0.2)',
            ],
            borderColor: [
                'rgba(95, 150, 198, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

//Kepadatan Penduduk
const rasioJenisKelamin = document.getElementById('chartRasioJk');
const chartRasioJk = new Chart(rasioJenisKelamin, {
    type: 'bar',
    data: {
        labels: [
          @foreach($penduduks as $penduduk)
            '{{ $penduduk->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Rasio',
            data: [
              @foreach($penduduks as $penduduk)
                {{ $penduduk->rasio_jk }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(95, 150, 198, 0.2)',
            ],
            borderColor: [
                'rgba(95, 150, 198, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>
@endsection
