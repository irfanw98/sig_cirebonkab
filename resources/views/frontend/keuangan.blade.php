@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/keuangan/style.css') }}">
@endsection

@section('content')
<section class="keuangan">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradKeuangan">
                    </div>
                    <div class="card-body keuangan-content">
                        <h5>KEUANGAN<br><span>Financial And Price</span></h5><br>
                        <p class="title">Banyak Sarana Lembaga Keuangan Yang Beroperasi Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenisnya di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Bank Umum Pemerintah</p>
                              <canvas id="chartBup"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Bank Umum Swasta</p>
                              <canvas id="chartBus"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Bank Perkreditan Rakyat</p>
                              <canvas id="chartBpr"></canvas>
                            </div>
                        </div>
                        <p class="title">Banyak Koperasi Yang Masih Aktif Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenis Koperasi di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Koperasi Unit Desa (KUD)</p>
                              <canvas id="chartKud"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Koperasi Industri Kecil dan Kerajinan Rakyat (KOPINKRA)</p>
                              <canvas id="chartKopinkra"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Koperasi Simpan Pinjam (KOSPIN)</p>
                              <canvas id="chartKospin"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="mt-3">Koperasi Lainnya</p>
                              <canvas id="chartKoperasiLain"></canvas>
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

const bankUmumPemerintah = document.getElementById('chartBup');
const chartBup = new Chart(bankUmumPemerintah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($keuangans as $keuangan)
            '{{ $keuangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($keuangans as $keuangan)
                {{ $keuangan->bank_umum_pemerintah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(188, 200, 143, 0.3)',
            ],
            borderColor: [
                'rgba(188, 200, 143, 1)',
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

const bankUmumSwasta = document.getElementById('chartBus');
const chartBus = new Chart(bankUmumSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($keuangans as $keuangan)
            '{{ $keuangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($keuangans as $keuangan)
                {{ $keuangan->bank_umum_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(188, 200, 143, 0.3)',
            ],
            borderColor: [
                'rgba(188, 200, 143, 1)',
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

const bankPerkreditanRakyat = document.getElementById('chartBpr');
const chartBpr = new Chart(bankPerkreditanRakyat, {
    type: 'bar',
    data: {
        labels: [
          @foreach($keuangans as $keuangan)
            '{{ $keuangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($keuangans as $keuangan)
                {{ $keuangan->bank_perkreditan_rakyat }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(188, 200, 143, 0.3)',
            ],
            borderColor: [
                'rgba(188, 200, 143, 1)',
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

const koperasiUnitDesa = document.getElementById('chartKud');
const chartKud = new Chart(koperasiUnitDesa, {
    type: 'bar',
    data: {
        labels: [
          @foreach($keuangans as $keuangan)
            '{{ $keuangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($keuangans as $keuangan)
                {{ $keuangan->kud }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(188, 200, 143, 0.3)',
            ],
            borderColor: [
                'rgba(188, 200, 143, 1)',
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

const kopinkra = document.getElementById('chartKopinkra');
const chartKopinkra = new Chart(kopinkra, {
    type: 'bar',
    data: {
        labels: [
          @foreach($keuangans as $keuangan)
            '{{ $keuangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($keuangans as $keuangan)
                {{ $keuangan->kopinkra }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(188, 200, 143, 0.3)',
            ],
            borderColor: [
                'rgba(188, 200, 143, 1)',
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

const kospin = document.getElementById('chartKospin');
const chartKospin = new Chart(kospin, {
    type: 'bar',
    data: {
        labels: [
          @foreach($keuangans as $keuangan)
            '{{ $keuangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($keuangans as $keuangan)
                {{ $keuangan->kospin }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(188, 200, 143, 0.3)',
            ],
            borderColor: [
                'rgba(188, 200, 143, 1)',
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

const koperasiLainnya = document.getElementById('chartKoperasiLain');
const chartKoperasiLain = new Chart(koperasiLainnya, {
    type: 'bar',
    data: {
        labels: [
          @foreach($keuangans as $keuangan)
            '{{ $keuangan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($keuangans as $keuangan)
                {{ $keuangan->koperasi_lainnya }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(188, 200, 143, 0.3)',
            ],
            borderColor: [
                'rgba(188, 200, 143, 1)',
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
