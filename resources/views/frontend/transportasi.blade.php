@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/transportasi/style.css') }}">
@endsection

@section('content')
<section class="transportasi">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradTransportasi">
                    </div>
                    <div class="card-body transportasi-content">
                        <h5>TRANSPORTASI<br><span>Transport</span></h5><br>
                        <p>Kondisi Jalan Darat Antar Desa/Kelurahan Menurut Desa/Kelurahan {{ $desa->nama_desa }} di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                <tr>
                                    <th rowspan="2" style="padding: 20px;">Tahun</th>
                                    <th rowspan="2" style="padding: 20px;">Jenis Permukaan Jalan</th>
                                    <th rowspan="2" style="padding: 20px;">Dapat Dilalui Kendaraan Bermotor Roda 4 atau Lebih</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach($transportasis as $transportasi)
                                   <tr>
                                        <td>{{ $transportasi->tahun }}</td>
                                        <td>{{ $transportasi->jenis_permukaan_jalan }}</td>
                                        <td>{{ $transportasi->akses_kendaraan }}</td>
                                   </tr>
                                @endforeach
                               </tbody>
                            </table>
                        </div>
                        <p class="mt-5">Sarana Transportasi Antar Desa/Kelurahan Menurut Desa/Kelurahan {{ $desa->nama_desa }} di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                <tr>
                                    <th rowspan="2" style="padding: 20px;">Tahun</th>
                                    <th rowspan="2" style="padding: 20px;">Jenis Transportasi</th>
                                    <th rowspan="2" style="padding: 20px;">Keberadaan Angkutan Umum</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach($transportasis as $transportasi)
                                   <tr>
                                        <td>{{ $transportasi->tahun }}</td>
                                        <td>{{ $transportasi->jenis_transportasi }}</td>
                                        <td>{{ $transportasi->angkutan_umum }}</td>
                                   </tr>
                                @endforeach
                               </tbody>
                            </table>
                        </div>
                        <p class="title mt-5">Jumlah Menara dan Operator Layanan Komunikasi Telepon Seluler Serta Kondisi Sinyal Telepon Seluler Menurut Desa/Kelurahan {{ $desa->nama_desa }} di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-around mt-5 mb-5">
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="m-3">Jumlah Menara Telepon Seluler (BTS)</p>
                              <canvas id="chartMenaraTelepon"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6 mt-3">
                              <p class="">Jumlah Layanan Komunikasi Telepon Seluler Yang Menjangkau di Desa/Kelurahan</p>
                              <canvas id="chartOperatorLayanan"></canvas>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                <tr>
                                    <th rowspan="2" style="padding: 20px;">Tahun</th>
                                    <th rowspan="2" style="padding: 20px;">Kondisi Sinyal Telepon Seluler di Sebagian Besar Wilayah Desa/Kelurahan</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach($transportasis as $transportasi)
                                   <tr>
                                        <td>{{ $transportasi->tahun }}</td>
                                        <td>{{ $transportasi->sinyal_telepon }}</td>
                                   </tr>
                                @endforeach
                               </tbody>
                            </table>
                        </div>
                        <p class="mt-5">Keberadaan Kantor Pos/Pos Pembantu/Rumah Pos dan Perusahaan/Agen Jasa Ekspedisi Swasta Menurut Desa/Kelurahan {{ $desa->nama_desa }} dan Jenis Sarana Kesehatan di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               <thead>
                                <tr>
                                    <th rowspan="2" style="padding: 20px;">Tahun</th>
                                    <th rowspan="2" style="padding: 20px;">Kantor Pos/Pos Pembantu/Rumah Pos</th>
                                    <th rowspan="2" style="padding: 20px;">Perusahaan/Agen Jasa Ekspedisi Swasta</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach($transportasis as $transportasi)
                                   <tr>
                                        <td>{{ $transportasi->tahun }}</td>
                                        <td>{{ $transportasi->kantor_pos }}</td>
                                        <td>{{ $transportasi->perusahaan }}</td>
                                   </tr>
                                @endforeach
                               </tbody>
                            </table>
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
  
const menaraTelepon = document.getElementById('chartMenaraTelepon');
const chartMenaraTelepon = new Chart(menaraTelepon, {
    type: 'bar',
    data: {
        labels: [
          @foreach($transportasis as $transportasi)
            '{{ $transportasi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($transportasis as $transportasi)
                {{ $transportasi->menara_telepon }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(95, 249, 160, 0.3)',
            ],
            borderColor: [
                'rgba(95, 249, 160, 1)',
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

const operatorLayanan = document.getElementById('chartOperatorLayanan');
const chartOperatorLayanan = new Chart(operatorLayanan, {
    type: 'bar',
    data: {
        labels: [
          @foreach($transportasis as $transportasi)
            '{{ $transportasi->tahun }}',
          @endforeach
        ],
        datasets: [{
            label: 'Jumlah',
            data: [
              @foreach($transportasis as $transportasi)
                {{ $transportasi->operator_layanan }},
              @endforeach
            ],
            backgroundColor: [
                'rgba(95, 249, 160, 0.3)',
            ],
            borderColor: [
                'rgba(95, 249, 160, 1)',
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
