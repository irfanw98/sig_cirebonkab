@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/sosial/style.css') }}">
@endsection

@section('content')
<section class="sosial">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradSosial">
                    </div>
                    <div class="card-body sosial-content">
                        <h5>SOSIAL<br><span>Social</span></h5><br>
                        <p class="title">Banyak Sekolah Dasar (SD) Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Sekolah Dasar (SD)</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak SD -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartSdNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartSdSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartSdJumlah"></canvas>
                            </div>
                        </div>
                        <p class="title mt-5">Banyak Madrasah Ibtidaiyah (MI) Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Madrasah Ibtidaiyah (MI)</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak MI -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartMiNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartMiSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartMiJumlah"></canvas>
                            </div>
                        </div>
                        <p class="title mt-5">Banyak Sekolah Menengah Pertama (SMP) Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Sekolah Menengah Pertama (SMP)</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak SMP -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartSmpNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartSmpSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartSmpJumlah"></canvas>
                            </div>
                        </div>
                        <p class="title mt-5">Banyak Madrasah Tsanawiyah (MTS) Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Madrasah Tsanawiyah (MTS)</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak MTS -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartMtsNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartMtsSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartMtsJumlah"></canvas>
                            </div>
                        </div>
                        <p class="title mt-5">Banyak Sekolah Menengah Atas (SMA) Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Sekolah Menengah Atas (SMA)</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak SMA -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartSmaNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartSmaSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartSmaJumlah"></canvas>
                            </div>
                        </div>
                        <p class="title mt-5">Banyak Madrasah Aliyah (MA) Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Madrasah Aliyah (MA)</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak MA -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartMaNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartMaSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartMaJumlah"></canvas>
                            </div>
                        </div>
                        <p class="title mt-5">Banyak Sekolah Menengah Kejuruan (SMK) Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Sekolah Menengah Kejuruan (SMK)</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak SMK -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartSmkNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartSmkSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartSmkJumlah"></canvas>
                            </div>
                        </div>
                        <p class="title mt-5">Banyak Perguruan Tinggi Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Perguruan Tinggi</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak Perguruan Tinggi -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Negeri</p>
                              <canvas id="chartPtNegeri"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Swasta</p>
                              <canvas id="chartPtSwasta"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Jumlah</p>
                              <canvas id="chartPtJumlah"></canvas>
                            </div>
                        </div>
                        <p class="mt-5">Kemudahan Untuk Mencapai Sarana Pendidikan Terdekat Bagi Desa/Kelurahan Yang Tidak Ada Sarana Pendidikan Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenjang Pendidikan di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Sarana Pendidikan Terdekat</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                <tr>
                                    <th rowspan="2" style="padding: 20px;">Tahun</th>
                                    <th rowspan="2" style="padding: 20px;">SD</th>
                                    <th rowspan="2" style="padding: 20px;">MI</th>
                                    <th rowspan="2" style="padding: 20px;">SMP</th>
                                    <th rowspan="2" style="padding: 20px;">MTS</th>
                                    <th rowspan="2" style="padding: 20px;">SMA</th>
                                    <th rowspan="2" style="padding: 20px;">MA</th>
                                    <th rowspan="2" style="padding: 20px;">SMK</th>
                                    <th rowspan="2" style="padding: 20px;">Perguruan Tinggi</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach($sosials as $sosial)
                                   <tr>
                                        <td>{{ $sosial->tahun }}</td>
                                        <td>{{ $sosial->sarana_sd }}</td>
                                        <td>{{ $sosial->sarana_mi }}</td>
                                        <td>{{ $sosial->sarana_smp }}</td>
                                        <td>{{ $sosial->sarana_mts }}</td>
                                        <td>{{ $sosial->sarana_sma }}</td>
                                        <td>{{ $sosial->sarana_ma }}</td>
                                        <td>{{ $sosial->sarana_smk }}</td>
                                        <td>{{ $sosial->sarana_pt }}</td>
                                   </tr>
                                @endforeach
                               </tbody>
                            </table>
                        </div>
                        <p class="title mt-5">Banyak Sarana Kesehatan Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenis Sarana Kesehatan di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Banyak Sarana Kesehatan</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak Sarana Kesehatan -->
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Rumah Sakit</p>
                              <canvas id="chartRs"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Rumah Sakit Bersalin</p>
                              <canvas id="chartRsb"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Poliklinik/Balai Pengobatan</p>
                              <canvas id="chartPoliklinik"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Rawat Inap (PUSKESMAS)</p>
                              <canvas id="chartRawatInap"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Tanpa Rawat Inap (PUSKESMAS)</p>
                              <canvas id="chartTanpaRawatInap"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4 mt-3">
                              <p class="mt-3">Apotek</p>
                              <canvas id="chartApotek"></canvas>
                            </div>
                        </div>
                        <p class="mt-5">Kemudahan Untuk Mencapai Sarana Kesehatan Terdekat Bagi Desa/Kelurahan Yang Tidak Ada Sarana Kesehatan Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenis Sarana Kesehatan di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Sarana Kesehatan Terdekat</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                <tr>
                                    <th rowspan="2" style="padding: 30px;">Tahun</th>
                                    <th rowspan="2" style="padding: 30px;">Rumah Sakit</th>
                                    <th rowspan="2" style="padding: 30px;">Rumah Sakit<br>Bersalin</th>
                                    <th rowspan="2" style="padding: 30px;">Poliklinik/Balai<br>Pengobatan</th>
                                    <th colspan="2">Puskesmas</th>
                                    <th rowspan="2" style="padding: 30px;">Apotek</th>
                                </tr>
                                <tr>
                                    <th>Rawat Inap</th>
                                    <th>Tanpa Rawat Inap</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach($sosials as $sosial)
                                   <tr>
                                        <td>{{ $sosial->tahun }}</td>
                                        <td>{{ $sosial->sarana_rs }}</td>
                                        <td>{{ $sosial->sarana_rs_bersalin }}</td>
                                        <td>{{ $sosial->sarana_poliklinik }}</td>
                                        <td>{{ $sosial->sarana_rawat_inap }}</td>
                                        <td>{{ $sosial->sarana_tanpa_rawat_inap }}</td>
                                        <td>{{ $sosial->sarana_apotek }}</td>
                                   </tr>
                                @endforeach
                               </tbody>
                            </table>
                        </div>
                        <p class="title mt-5">Banyak Warga Penderita Gizi Buruk Menurut Desa/Kelurahan {{ $desa->nama_desa }}  di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Gizi Buruk</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <!-- Banyak Gizi Buruk -->
                            <div class="col-md-12 col-lg-12 mt-3">
                              <canvas id="chartGiziBuruk"></canvas>
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

//BANYAK SD NEGERI
const sdNegeri = document.getElementById('chartSdNegeri');
const chartSdNegeri = new Chart(sdNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sd_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 255, 0, 0, 0.5)',
            ],
            borderColor: [
                'rgba( 255, 0, 0, 1)',
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

//BANYAK SD SWASTA
const sdSwasta = document.getElementById('chartSdSwasta');
const chartSdSwasta = new Chart(sdSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sd_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 255, 0, 0, 0.5)',
            ],
            borderColor: [
                'rgba( 255, 0, 0, 1)',
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

//JUMLAH SELURUH SD
const sdJumlah = document.getElementById('chartSdJumlah');
const chartSdJumlah = new Chart(sdJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sd_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 255, 0, 0, 0.5)',
            ],
            borderColor: [
                'rgba( 255, 0, 0, 1)',
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

//====================================MI===================================//

//BANYAK MI NEGERI
const miNegeri = document.getElementById('chartMiNegeri');
const chartMiNegeri = new Chart(miNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->mi_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 152, 251, 152, 0.5)',
            ],
            borderColor: [
                'rgba( 152, 251, 152, 1)',
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

//BANYAK MI SWASTA
const miSwasta = document.getElementById('chartMiSwasta');
const chartMiSwasta = new Chart(miSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->mi_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 152, 251, 152, 0.5)',
            ],
            borderColor: [
                'rgba( 152, 251, 152, 1)',
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

//JUMLAH SELURUH MI
const miJumlah = document.getElementById('chartMiJumlah');
const chartMiJumlah = new Chart(miJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->mi_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 152, 251, 152, 0.5)',
            ],
            borderColor: [
                'rgba( 152, 251, 152, 1)',
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

//======================================SMP==================================//

//BANYAK SMP NEGERI
const smpNegeri = document.getElementById('chartSmpNegeri');
const chartSmpNegeri = new Chart(smpNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->smp_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 30, 144, 255, 0.2)',
            ],
            borderColor: [
                'rgba( 30, 144, 255, 1)',
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

//BANYAK SMP SWASTA
const smpSwasta = document.getElementById('chartSmpSwasta');
const chartSmpSwasta = new Chart(smpSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->smp_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 30, 144, 255, 0.2)',
            ],
            borderColor: [
                'rgba( 30, 144, 255, 1)',
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

//JUMLAH SELURUH SMP
const smpJumlah = document.getElementById('chartSmpJumlah');
const chartSmpJumlah = new Chart(smpJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->smp_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 30, 144, 255, 0.2)',
            ],
            borderColor: [
                'rgba( 30, 144, 255, 1)',
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

//======================================MTS===================================//

//BANYAK MTS NEGERI
const mtsNegeri = document.getElementById('chartMtsNegeri');
const chartMtsNegeri = new Chart(mtsNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->mts_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 34, 139, 34, 0.5)',
            ],
            borderColor: [
                'rgba( 34, 139, 34, 1)',
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

//BANYAK MTS SWASTA
const mtsSwasta = document.getElementById('chartMtsSwasta');
const chartMtsSwasta = new Chart(mtsSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->mts_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 34, 139, 34, 0.5)',
            ],
            borderColor: [
                'rgba( 34, 139, 34, 1)',
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

//JUMLAH SELURUH MTS
const mtsJumlah = document.getElementById('chartMtsJumlah');
const chartMtsJumlah = new Chart(mtsJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->mts_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 34, 139, 34, 0.5)',
            ],
            borderColor: [
                'rgba( 34, 139, 34, 1)',
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
//==================================================SMA===================================//

//BANYAK SMA NEGERI
const smaNegeri = document.getElementById('chartSmaNegeri');
const chartSmaNegeri = new Chart(smaNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sma_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 169, 169, 169, 0.5)',
            ],
            borderColor: [
                'rgba( 169, 169, 169, 1)',
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

//BANYAK SMA SWASTA
const smaSwasta = document.getElementById('chartSmaSwasta');
const chartSmaSwasta = new Chart(smaSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sma_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 169, 169, 169, 0.5)',
            ],
            borderColor: [
                'rgba( 169, 169, 169, 1)',
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

//JUMLAH SELURUH SMA
const smaJumlah = document.getElementById('chartSmaJumlah');
const chartSmaJumlah = new Chart(smaJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sma_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 169, 169, 169, 0.5)',
            ],
            borderColor: [
                'rgba( 169, 169, 169, 1)',
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

//==================================================MA===================================//

//BANYAK MA NEGERI
const maNegeri = document.getElementById('chartMaNegeri');
const chartMaNegeri = new Chart(maNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->ma_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 47, 79, 79, 0.5 )',
            ],
            borderColor: [
                'rgba( 47, 79, 79, 1 )',
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

//BANYAK MA SWASTA
const maSwasta = document.getElementById('chartMaSwasta');
const chartMaSwasta = new Chart(maSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->ma_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 47, 79, 79, 0.5 )',
            ],
            borderColor: [
                'rgba( 47, 79, 79, 1 )',
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

//JUMLAH SELURUH MA
const maJumlah = document.getElementById('chartMaJumlah');
const chartMaJumlah = new Chart(maJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->ma_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 47, 79, 79, 0.5 )',
            ],
            borderColor: [
                'rgba( 47, 79, 79, 1 )',
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

//==================================================SMK===================================//

//BANYAK SMK NEGERI
const smkNegeri = document.getElementById('chartSmkNegeri');
const chartSmkNegeri = new Chart(smkNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->smk_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 25, 25, 112, 0.5 )',
            ],
            borderColor: [
                'rgba( 25, 25, 112, 1 )',
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

//BANYAK SMK SWASTA
const smkSwasta = document.getElementById('chartSmkSwasta');
const chartSmkSwasta = new Chart(smkSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->smk_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 25, 25, 112, 0.5 )',
            ],
            borderColor: [
                'rgba( 25, 25, 112, 1 )',
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

//JUMLAH SELURUH SMK
const smkJumlah = document.getElementById('chartSmkJumlah');
const chartSmkJumlah = new Chart(smkJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->smk_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 25, 25, 112, 0.5 )',
            ],
            borderColor: [
                'rgba( 25, 25, 112, 1 )',
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
//=======================================Perguruan Tinggi==============================//

//BANYAK PT NEGERI
const ptNegeri = document.getElementById('chartPtNegeri');
const chartPtNegeri = new Chart(ptNegeri, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->pt_negeri }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 160, 82, 45, 0.2 )',
            ],
            borderColor: [
                'rgba( 160, 82, 45, 1 )',
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

//BANYAK PT SWASTA
const ptSwasta = document.getElementById('chartPtSwasta');
const chartPtSwasta = new Chart(ptSwasta, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->pt_swasta }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 160, 82, 45, 0.2 )',
            ],
            borderColor: [
                'rgba( 160, 82, 45, 1 )',
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

//JUMLAH SELURUH PT
const ptJumlah = document.getElementById('chartPtJumlah');
const chartPtJumlah = new Chart(ptJumlah, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->pt_jumlah }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 160, 82, 45, 0.2 )',
            ],
            borderColor: [
                'rgba( 160, 82, 45, 1 )',
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

//=======================================SARANA KESEHATAN==============================//

//BANYAK RUMAH SAKIT
const rumahSakit = document.getElementById('chartRs');
const chartRs = new Chart(rumahSakit, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sarana_rs }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 0, 255, 127, 0.5)',
            ],
            borderColor: [
                'rgba( 0, 255, 127, 1)',
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

//BANYAK RUMAH SAKIT BERSALIN
const rumahSakitBersalin = document.getElementById('chartRsb');
const chartRsb = new Chart(rumahSakitBersalin, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sarana_rs_bersalin }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 0, 255, 127, 0.5)',
            ],
            borderColor: [
                'rgba( 0, 255, 127, 1)',
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

//BANYAK POLIKLINIK
const poliklinik = document.getElementById('chartPoliklinik');
const chartPoliklinik = new Chart(poliklinik, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sarana_poliklinik }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 0, 255, 127, 0.5)',
            ],
            borderColor: [
                'rgba( 0, 255, 127, 1)',
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

//BANYAK RAWAT INAP
const rawatInap = document.getElementById('chartRawatInap');
const chartRawatInap = new Chart(rawatInap, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sarana_rawat_inap }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 0, 255, 127, 0.5)',
            ],
            borderColor: [
                'rgba( 0, 255, 127, 1)',
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

//BANYAK TANPA RAWAT INAP
const tanpaRawatInap = document.getElementById('chartTanpaRawatInap');
const chartTanpaRawatInap = new Chart(tanpaRawatInap, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sarana_tanpa_rawat_inap }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 0, 255, 127, 0.5)',
            ],
            borderColor: [
                'rgba( 0, 255, 127, 1)',
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

//BANYAK APOTEK
const apotek = document.getElementById('chartApotek');
const chartApotek = new Chart(apotek, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->sarana_apotek }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 0, 255, 127, 0.5)',
            ],
            borderColor: [
                'rgba( 0, 255, 127, 1)',
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
//=======================================GIZI BURUK==============================//

//BANYAK GIZI BURUK
const giziBuruk = document.getElementById('chartGiziBuruk');
const chartGiziBuruk = new Chart(giziBuruk, {
    type: 'bar',
    data: {
        labels: [
          @foreach($sosials as $sosial)
            '{{ $sosial->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
              @foreach($sosials as $sosial)
                {{ $sosial->gizi_buruk }},
              @endforeach
            ],
            backgroundColor: [
                'rgba( 255, 99, 71, 0.5 )',
            ],
            borderColor: [
                'rgba( 255, 99, 71, 1 )',
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
