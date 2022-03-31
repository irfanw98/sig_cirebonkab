@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/energi/style.css') }}">
@endsection

@section('content')
<section class="energi">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradEnergi">
                    </div>
                    <div class="card-body energi-content">
                        <h5>ENERGI<br><span>Energy</span></h5><br>
                        <p class="title">Banyak Keluarga Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenis Pengguna Listrik di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Pengguna Listrik</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">PLN</p>
                              <canvas id="chartPln"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Non PLN</p>
                              <canvas id="chartNonPln"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartJumlahPln"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3 mb-5">
                            <div class="col-md-12 col-lg-12 mt-2">
                                <p class="title mt-3">Bukan Pengguna Listrik</p>
                                <canvas id="chartNonListik"></canvas>
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
//=============================================ENERGI===================================//

//PLN
const pln = document.getElementById('chartPln');
const chartPln = new Chart(pln, {
    type: 'bar',
    data: {
        labels: [
          @foreach($energis as $energi)
            '{{ $energi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($energis as $energi)
                {{ $energi->pln }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(255, 248, 0, 0.2)',
            ],
            borderColor: [
                'rgba(255, 248, 0, 1)',
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

//NON PLN
const nonPln = document.getElementById('chartNonPln');
const chartNonPln = new Chart(nonPln, {
    type: 'bar',
    data: {
        labels: [
          @foreach($energis as $energi)
            '{{ $energi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($energis as $energi)
                {{ $energi->non_pln }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(255, 248, 0, 0.2)',
            ],
            borderColor: [
                'rgba(255, 248, 0, 1)',
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

//JUMLAH PLN
const jumlahPln = document.getElementById('chartJumlahPln');
const chartJumlahPln = new Chart(jumlahPln, {
    type: 'bar',
    data: {
        labels: [
          @foreach($energis as $energi)
            '{{ $energi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($energis as $energi)
                {{ $energi->pln_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(255, 248, 0, 0.2)',
            ],
            borderColor: [
                'rgba(255, 248, 0, 1)',
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

//NON LISTRIK
const nonListrik = document.getElementById('chartNonListik');
const chartNonListik = new Chart(nonListrik, {
    type: 'bar',
    data: {
        labels: [
          @foreach($energis as $energi)
            '{{ $energi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($energis as $energi)
                {{ $energi->non_listrik }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(255, 248, 0, 0.2)',
            ],
            borderColor: [
                'rgba(255, 248, 0, 1)',
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
