@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/pemerintahan/style.css') }}">
@endsection

@section('content')
<section class="pemerintahan">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradPemerintahan">
                    </div>
                    <div class="card-body pemerintahan-content">
                        <h5>Pemerintahan<br><span>Government</span></h5><br>
                        <p class="title">Banyak Sarana Pemerintahan Desa {{ $desa->nama_desa }} di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="mt-3">Balai/Kantor Desa/Kel</p>
                        <div class="row mt-5 mb-5">
                            <div class="col-md-12 col-lg-12">
                                <canvas id="chartKantorDesa" width="100%" height="40%x"></canvas>
                            </div>
                        </div>
                        <p class="title">Jumlah Perangkat Desa {{ $desa->nama_desa }} di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-center mt-3 mb-5">
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Kepala Desa</p>
                                <canvas id="chartKepalaDesa"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Sekretaris Desa</p>
                                <canvas id="chartSekretarisDesa"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Kepala Urusan</p>
                                <canvas id="chartKepalaUrusan"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Kepala Dusun</p>
                                <canvas id="chartKepalaDusun"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Hansip</p>
                                <canvas id="chartHansip"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Pos Kamling</p>
                                <canvas id="chartPosKamling"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Dusun</p>
                                <canvas id="chartDusun"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3 ">Rukun Warga (RW)</p>
                                <canvas id="chartRw"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Rukun Tetangga (RT)</p>
                                <canvas id="chartRt"></canvas>
                            </div>
                        </div>
                        <p class="title">Jumlah Ketua, Wakil, Sekretaris, dan Anggota BPD Menurut Desa {{ $desa->nama_desa }} di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">BPD</p>
                        <div class="row justify-content-center mt-3 mb-5">
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Ketua</p>
                                <canvas id="chartKetuaBpd"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Wakil</p>
                                <canvas id="chartWakilBpd"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Sekretaris</p>
                                <canvas id="chartSekretarisBpd"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-2">
                                <p class="mt-3">Bendahara</p>
                                <canvas id="chartBendaharaBpd"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-2">
                                <p class="mt-3">Anggota</p>
                                <canvas id="chartAnggotaBpd"></canvas>
                            </div>
                        </div>
                        <p class="title">Jumlah Ketua, Wakil, Sekretaris, dan Anggota LPMD Menurut Desa {{ $desa->nama_desa }} di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">LPMD</p>
                        <div class="row justify-content-center mt-3 mb-5">
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Ketua</p>
                                <canvas id="chartKetuaLpmd"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Wakil</p>
                                <canvas id="chartWakilLpmd"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-2">
                                <p class="mt-3">Sekretaris</p>
                                <canvas id="chartSekretarisLpmd"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-2">
                                <p class="mt-3">Bendahara</p>
                                <canvas id="chartBendaharaLpmd"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-2">
                                <p class="mt-3">Anggota</p>
                                <canvas id="chartAnggotaLpmd"></canvas>
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

//Kantor Desa
const kantorDesa = document.getElementById('chartKantorDesa');
const chartKantorDesa = new Chart(kantorDesa, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->kantor_desa }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgb(106, 90, 205)',
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

//Kepala Desa
const kepalaDesa = document.getElementById('chartKepalaDesa');
const chartKepalaDesa = new Chart(kepalaDesa, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->kepala_desa }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//Sekretaris Desa
const sekretarisDesa = document.getElementById('chartSekretarisDesa');
const chartSekretarisDesa = new Chart(sekretarisDesa, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->sekretaris_desa }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//Kepala Urusan
const kepalaUrusan = document.getElementById('chartKepalaUrusan');
const chartKepalaUrusan = new Chart(kepalaUrusan, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->kepala_urusan }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//Kepala Dusun
const kepalaDusun = document.getElementById('chartKepalaDusun');
const chartKepalaDusun = new Chart(kepalaDusun, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->kepala_dusun }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//Hansip
const hansip = document.getElementById('chartHansip');
const chartHansip = new Chart(hansip, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->hansip }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//PosKamling
const posKamling = document.getElementById('chartPosKamling');
const chartPosKamling = new Chart(posKamling, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->pos_kamling }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//Dusun
const dusun = document.getElementById('chartDusun');
const chartDusun = new Chart(dusun, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->dusun }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//RW
const rukunWarga = document.getElementById('chartRw');
const chartRw = new Chart(rukunWarga, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->rukun_warga }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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

//RT
const rukunTetangga = document.getElementById('chartRt');
const chartRt = new Chart(rukunTetangga, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->rukun_tetangga }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [
                'rgb(201, 203, 207)',
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


//Ketua BPD
const ketuaBpd = document.getElementById('chartKetuaBpd');
const chartKetuaBpd = new Chart(ketuaBpd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->ketua_bpd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(100, 200, 70, 0.2)',
            ],
            borderColor: [
                'rgba(100, 200, 70, 1)',
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

// Wakil BPD
const wakilBpd = document.getElementById('chartWakilBpd');
const chartWakilBpd = new Chart(wakilBpd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->wakil_bpd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(100, 200, 70, 0.2)',
            ],
            borderColor: [
                'rgba(100, 200, 70, 1)',
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

//Sekretaris BPD
const sekretarisBpd = document.getElementById('chartSekretarisBpd');
const chartSekretarisBpd = new Chart(sekretarisBpd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->sekretaris_bpd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(100, 200, 70, 0.2)',
            ],
            borderColor: [
                'rgba(100, 200, 70, 1)',
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

//BendaharaBPD
const bendaharaBpd = document.getElementById('chartBendaharaBpd');
const chartBendaharaBpd = new Chart(bendaharaBpd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->bendahara_bpd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(100, 200, 70, 0.2)',
            ],
            borderColor: [
                'rgba(100, 200, 70, 1)',
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

//AnggotaBPD
const anggotaBpd = document.getElementById('chartAnggotaBpd');
const chartAnggotaBpd = new Chart(anggotaBpd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->anggota_bpd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(100, 200, 70, 0.2)',
            ],
            borderColor: [
                'rgba(100, 200, 70, 1)',
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


//KetuaLPMD
const ketuaLpmd = document.getElementById('chartKetuaLpmd');
const chartKetuaLpmd = new Chart(ketuaLpmd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->ketua_lpmd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(200, 90, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
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

//WakilLPMD
const wakilLpmd = document.getElementById('chartWakilLpmd');
const chartWakilLpmd = new Chart(wakilLpmd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->wakil_lpmd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(200, 90, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
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

//SekretarisLPMD
const sekretarisLpmd = document.getElementById('chartSekretarisLpmd');
const chartSekretarisLpmd = new Chart(sekretarisLpmd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->sekretaris_lpmd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(200, 90, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
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

//BendaharaLPMD
const bendaharaLpmd = document.getElementById('chartBendaharaLpmd');
const chartBendaharaLpmd = new Chart(bendaharaLpmd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->bendahara_lpmd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(200, 90, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
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

//AnggotaLPMD
const anggotaLpmd = document.getElementById('chartAnggotaLpmd');
const chartAnggotaLpmd = new Chart(anggotaLpmd, {
    type: 'bar',
    data: {
        labels: [
          @foreach($pemerintahans as $pemerintahan)
            '{{ $pemerintahan->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($pemerintahans as $pemerintahan)
                {{ $pemerintahan->anggota_lpmd }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(200, 90, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
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
