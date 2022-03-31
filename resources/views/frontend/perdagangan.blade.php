@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/perdagangan/style.css') }}">
@endsection

@section('content')
<section class="perdagangan">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradPerdagangan">
                    </div>
                    <div class="card-body perdagangan-content">
                        <h5>PERDAGANGAN<br><span>Trading</span></h5><br>
                        <p class="title">Banyak Sarana Dan Prasarana Ekonomi Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenisnya di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Kelompok Pertokoan</p>
                              <canvas id="chartKelPer"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Pasar Dengan Bangunan Permanen</p>
                              <canvas id="chartPbp"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Pasar Dengan Bangunan Semi Permanen</p>
                              <canvas id="chartPbsp"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Pasar Tanpa Bangunan</p>
                              <canvas id="chartPtb"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Minimarket/Swalayan</p>
                              <canvas id="chartMinimarket"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Toko/Warung Kelontong</p>
                              <canvas id="chartToko"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Restoran/Rumah Makan</p>
                              <canvas id="chartRestoran"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Warung/Kedai Makanan</p>
                              <canvas id="chartWarung"></canvas>
                            </div>     
                        </div>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Hotel</p>
                              <canvas id="chartHotel"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Hostel/Motel/Losmen/Wisma</p>
                              <canvas id="chartMotel"></canvas>
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

const kelompokPertokoan = document.getElementById('chartKelPer');
const chartKelPer = new Chart(kelompokPertokoan, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->kelompok_pertokoan }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const pasarBangunanPermanen = document.getElementById('chartPbp');
const chartPbp = new Chart(pasarBangunanPermanen, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->pasar_bangunan_permanen }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const pasarBangunanSemiPermanen = document.getElementById('chartPbsp');
const chartPbsp = new Chart(pasarBangunanSemiPermanen, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->pasar_bangunan_semipermanen }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const pasarTanpaBangunan = document.getElementById('chartPtb');
const chartPtb = new Chart(pasarTanpaBangunan, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->pasar_tanpa_bangunan }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const miniMarket = document.getElementById('chartMinimarket');
const chartMinimarket = new Chart(miniMarket, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->minimarket }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const toko = document.getElementById('chartToko');
const chartToko = new Chart(toko, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->toko }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const restoran = document.getElementById('chartRestoran');
const chartRestoran = new Chart(restoran, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->restoran }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const warung = document.getElementById('chartWarung');
const chartWarung = new Chart(warung, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->warung }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const hotel = document.getElementById('chartHotel');
const chartHotel = new Chart(hotel, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->hotel }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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

const motel = document.getElementById('chartMotel');
const chartMotel = new Chart(motel, {
    type: 'bar',
    data: {
        labels: [
          @foreach($perdagangans as $perdagangan)
            '{{ $perdagangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($perdagangans as $perdagangan)
                {{ $perdagangan->motel }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(160, 5, 45, 0.3)',
            ],
            borderColor: [
                'rgba(160, 5, 45, 1)',
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
</script>
@endsection
