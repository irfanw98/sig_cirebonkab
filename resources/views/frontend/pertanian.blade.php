@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/statistik/pertanian/style.css') }}">
@endsection

@section('content')
<section class="pertanian">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="gradPertanian">
                    </div>
                    <div class="card-body pertanian-content">
                        <h5>PERTANIAN<br><span>Agriculture</span></h5><br>
                        <p>Luas Panen dan Produksi Tanaman Padi Sawah dan Palawija di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Paddi Sawah/ Paddy Rice</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Tanam</p>
                                <canvas id="chartLuasTanamPadi"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenPadi"></canvas>
                            </div>
                              <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiPadi"></canvas>
                            </div>
                        </div>
                        <p class="title">Jagung / Maize</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Tanam</p>
                                <canvas id="chartLuasTanamJagung"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenJagung"></canvas>
                            </div>
                              <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiJagung"></canvas>
                            </div>
                        </div>
                        <p class="title">Ubi Kayu/ Cassava</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Tanam</p>
                                <canvas id="chartLuasTanamUbiKayu"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenUbiKayu"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi</p>
                                <canvas id="chartProduksiUbiKayu"></canvas>
                            </div>
                        </div>
                        <p class="title">Kedelai/ Soy</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Tanam</p>
                                <canvas id="chartLuasTanamKedelai"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenKedelai"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi</p>
                                <canvas id="chartProduksiKedelai"></canvas>
                            </div>
                        </div>
                        <p class="title">Kacang Hijau/ Green Beans</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Tanam</p>
                                <canvas id="chartLuasTanamKacangHijau"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenKacangHijau"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi</p>
                                <canvas id="chartProduksiKacangHijau"></canvas>
                            </div>
                        </div>
                        <p class="title">Kacang Tanah/ Peanuts</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Tanam</p>
                                <canvas id="chartLuasTanamKacangTanah"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenKacangTanah"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi</p>
                                <canvas id="chartProduksiKacangTanah"></canvas>
                            </div>
                        </div>
                         <p class="title">Ubi Jalar/ Sweet Potato</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Tanam</p>
                                <canvas id="chartLuasTanamUbiJalar"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenUbiJalar"></canvas>
                            </div>
                             <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi</p>
                                <canvas id="chartProduksiUbiJalar"></canvas>
                            </div>
                        </div>
                        <p>Luas Panen dan Produksi Tanaman Sayuran dan Buah-buahan Semusim Menurut Jenis Tanaman di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Bawang Merah/ Shallots</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenBawang"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiBawang"></canvas>
                            </div>
                        </div>
                        <p class="title">Cabai Besar/ Chili/Big chili</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenCabaiBesar"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiCabaiBesar"></canvas>
                            </div>
                        </div>
                        <p class="title">Cabai Rawit/ Chili/Cayenne Pepper</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenCabaiRawit"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiCabaiRawit"></canvas>
                            </div>
                        </div>
                        <p class="title">Kacang Panjang/ Long Beans</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenKacangPnjng"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiKacangPnjng"></canvas>
                            </div>
                        </div>
                        <p class="title">Kangkung/ Water Spinach</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenKangkung"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiKangkung"></canvas>
                            </div>
                        </div>
                        <p class="title">Ketimun/ Cucumber</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenKetimun"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiKetimun"></canvas>
                            </div>
                        </div>
                        <p class="title">Semangka/ Water Melon (kw/ qui )</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenSemangka"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiSemangka"></canvas>
                            </div>
                        </div>
                        <p class="title">Terung/ Eggplant</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Panen</p>
                                <canvas id="chartLuasPanenTerung"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiTerung"></canvas>
                            </div>
                        </div>
                        <p>Luas Areal Tanaman dan Produksi Perkebunan Menurut Jenis Tanaman di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <p class="title">Kelapa / Coconut</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Areal Tanaman</p>
                                <canvas id="chartLuasArealKelapa"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiKelapa"></canvas>
                            </div>
                        </div>
                        <p class="title">Tebu / Sugar Cane</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Luas Areal Tanaman</p>
                                <canvas id="chartLuasArealTebu"></canvas>
                            </div>
                              <div class="col-md-6 col-lg-6">
                                <p class="title">Produksi</p>
                              <canvas id="chartProduksiTebu"></canvas>
                            </div>
                        </div>
                        <p>Populasi Ternak Menurut Jenis Ternak di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Sapi Perah / Dairy Cattle</p>
                                <canvas id="chartSapiPerah"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Sapi Potong / Beef Cattle</p>
                                <canvas id="chartSapiPotong"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Kerbau / Buffalo</p>
                                <canvas id="chartKerbau"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Kuda / Horse </p>
                                <canvas id="chartKuda"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Kambing / Goat</p>
                                <canvas id="chartKambing"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Domba / Sheep</p>
                                <canvas id="chartDomba"></canvas>
                            </div>
                        </div>
                        <p>Populasi Unggas Menurut Jenis Unggas di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Ayam Kampung / Native Chicken</p>
                                <canvas id="chartAyamKampung"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Ayam Petelur / Layer</p>
                                <canvas id="chartAyamPetelur"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Ayam Pedaging / Broiler</p>
                                <canvas id="chartAyamPedaging"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Itik Manila / Muscovy Duck</p>
                                <canvas id="chartItikManila"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Itik / Duck</p>
                                <canvas id="chartItik"></canvas>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Merpati / Dove</p>
                                <canvas id="chartMerpati"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Puyuh / Quail</p>
                                <canvas id="chartPuyuh"></canvas>
                            </div>
                        </div>
                        <p>Jumlah Nelayan Perikanan Tangkap Menurut Jenis Nelayan di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Nelayan Penuh / Full Time</p>
                                <canvas id="chartNelayanPenuh"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="title">Nelayan Sambilan Utama / Part Time</p>
                                <canvas id="chartNelayanSambilan"></canvas>
                            </div>
                        </div>
                        <p>Jumlah Kapal Menurut Kategori Kapal di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-6 col-lg-6">
                                <p class="title">< 5GT</p>
                                <canvas id="chartKapalKurangLimaGt"></canvas>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="title">5 - 10 GT</p>
                                <canvas id="chartKapalLimaSampaiSepuluhGt"></canvas>
                            </div>
                        </div>
                        <p>Jumlah Rumah Tangga Perikanan Budidaya Menurut Jenis Budidaya di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Budidaya Laut / Marine Culture</p>
                                <canvas id="chartBudidayaLaut"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Tambak Brackish / Water Pond</p>
                                <canvas id="chartBudidayaTambak"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Kolam Fresh / Water Pond </p>
                                <canvas id="chartBudidayaKolam"></canvas>
                            </div>
                        </div>
                        <p>Jumlah Petambak, Luas Lahan dan Produksi Garam di Kecamatan {{ $desa->kecamatan->nama_kecamatan }} Kabupaten Cirebon</p>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Petambak (Orang) / Salt Farmers (People)</p>
                                <canvas id="chartPetambakGaram"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Luas Lahan (ha) / Land Area (ha)</p>
                                <canvas id="chartLuasLahanGaram"></canvas>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p class="title">Produksi (ton) / Production (ton)</p>
                                <canvas id="chartProduksiGaram"></canvas>
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
//Padi Sawah / Paddy Rice
    var luasTanamPadi = document.getElementById('chartLuasTanamPadi');
    var chartLuasTanamPadi = new Chart(luasTanamPadi, {
        type: 'bar',
        data: {
            labels: [
                @if(!empty($padipalawijas['Padi Sawah/Paddy Rice']))
                    @foreach($padipalawijas['Padi Sawah/Paddy Rice'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['tahun']); ?>
                    @endforeach
                @else
                    '',
                @endif
            ],
            datasets: [{
                label: 'Luas Tanam(Ha)',
                data: [
                    @if(!empty($padipalawijas['Padi Sawah/Paddy Rice']))
                        @foreach($padipalawijas['Padi Sawah/Paddy Rice'] as $padipalawija)
                            <?php  echo json_encode($padipalawija['luas_tanam']); ?>
                        @endforeach
                    @else
                        0,
                    @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var luasPanenPadi = document.getElementById('chartLuasPanenPadi');
    var chartLuasPanenPadi = new Chart(luasPanenPadi, {
        type: 'bar',
        data: {
            labels: [
                @if(!empty($padipalawijas['Padi Sawah/Paddy Rice']))
                    @foreach($padipalawijas['Padi Sawah/Paddy Rice'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['tahun']); ?>
                    @endforeach
                @else
                    '',
                @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                    @if(!empty($padipalawijas['Padi Sawah/Paddy Rice']))
                        @foreach($padipalawijas['Padi Sawah/Paddy Rice'] as $padipalawija)
                            <?php  echo json_encode($padipalawija['luas_panen']); ?>
                        @endforeach
                    @else
                        0,
                    @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiPadi = document.getElementById('chartProduksiPadi');
    var chartProduksiPadi = new Chart(produksiPadi, {
        type: 'bar',
        data: {
            labels: [
                @if(!empty($padipalawijas['Padi Sawah/Paddy Rice']))
                    @foreach($padipalawijas['Padi Sawah/Paddy Rice'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['tahun']); ?>
                    @endforeach
                @else
                    '',
                @endif
            ],
            datasets: [{
                label: '(Ton)',
                data: [
                    @if(!empty($padipalawijas['Padi Sawah/Paddy Rice']))
                        @foreach($padipalawijas['Padi Sawah/Paddy Rice'] as $padipalawija)
                            <?php  echo json_encode($padipalawija['produksi']); ?>
                        @endforeach
                    @else
                        0,
                    @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

//Jagung / Maize
    var luasTanamJagung = document.getElementById('chartLuasTanamJagung');
    var chartLuasTanamJagung = new Chart(luasTanamJagung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Jagung/Maize']))
                @foreach($padipalawijas['Jagung/Maize'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Tanam(Ha)',
                data: [
                @if(!empty($padipalawijas['Jagung/Maize']))
                    @foreach($padipalawijas['Jagung/Maize'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_tanam']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var luasPanenJagung = document.getElementById('chartLuasPanenJagung');
    var chartLuasPanenJagung = new Chart(luasPanenJagung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Jagung/Maize']))
                @foreach($padipalawijas['Jagung/Maize'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($padipalawijas['Jagung/Maize']))
                    @foreach($padipalawijas['Jagung/Maize'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiJagung = document.getElementById('chartProduksiJagung');
    var chartProduksiJagung = new Chart(produksiJagung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Jagung/Maize']))
                @foreach($padipalawijas['Jagung/Maize'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ton)',
                data: [
                @if(!empty($padipalawijas['Jagung/Maize']))
                    @foreach($padipalawijas['Jagung/Maize'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Ubi Kayu / Cassava

    var luasTanamUbiKayu = document.getElementById('chartLuasTanamUbiKayu');
    var chartLuasTanamUbiKayu = new Chart(luasTanamUbiKayu, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Ubi Kayu/Cassava']))
                @foreach($padipalawijas['Ubi Kayu/Cassava'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Tanam(Ha)',
                data: [
                @if(!empty($padipalawijas['Ubi Kayu/Cassava']))
                    @foreach($padipalawijas['Ubi Kayu/Cassava'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_tanam']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var luasPanenUbiKayu = document.getElementById('chartLuasPanenUbiKayu');
    var chartLuasPanenUbiKayu = new Chart(luasPanenUbiKayu, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Ubi Kayu/Cassava']))
                @foreach($padipalawijas['Ubi Kayu/Cassava'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($padipalawijas['Ubi Kayu/Cassava']))
                    @foreach($padipalawijas['Ubi Kayu/Cassava'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiUbiKayu = document.getElementById('chartProduksiUbiKayu');
    var chartProduksiUbiKayu = new Chart(produksiUbiKayu, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Ubi Kayu/Cassava']))
                @foreach($padipalawijas['Ubi Kayu/Cassava'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ton)',
                data: [
                @if(!empty($padipalawijas['Ubi Kayu/Cassava']))
                    @foreach($padipalawijas['Ubi Kayu/Cassava'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kedelai / Soy

    var luasTanamKedelai = document.getElementById('chartLuasTanamKedelai');
    var chartLuasTanamKedelai = new Chart(luasTanamKedelai, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kedelai/Soy']))
                @foreach($padipalawijas['Kedelai/Soy'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Tanam(Ha)',
                data: [
                @if(!empty($padipalawijas['Kedelai/Soy']))
                    @foreach($padipalawijas['Kedelai/Soy'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_tanam']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var luasPanenKedelai = document.getElementById('chartLuasPanenKedelai');
    var chartLuasPanenKedelai = new Chart(luasPanenKedelai, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kedelai/Soy']))
                @foreach($padipalawijas['Kedelai/Soy'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($padipalawijas['Kedelai/Soy']))
                    @foreach($padipalawijas['Kedelai/Soy'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiKedelai = document.getElementById('chartProduksiKedelai');
    var chartProduksiKedelai = new Chart(produksiKedelai, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kedelai/Soy']))
                @foreach($padipalawijas['Kedelai/Soy'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ton)',
                data: [
                @if(!empty($padipalawijas['Kedelai/Soy']))
                    @foreach($padipalawijas['Kedelai/Soy'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kacang Hijau / Green Beans
    
    var luasTanamKacangHijau = document.getElementById('chartLuasTanamKacangHijau');
    var chartLuasTanamKacangHijau = new Chart(luasTanamKacangHijau, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kacang Hijau/Green Beans']))
                @foreach($padipalawijas['Kacang Hijau/Green Beans'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Tanam(Ha)',
                data: [
                @if(!empty($padipalawijas['Kacang Hijau/Green Beans']))
                    @foreach($padipalawijas['Kacang Hijau/Green Beans'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_tanam']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var luasPanenKacangHijau = document.getElementById('chartLuasPanenKacangHijau');
    var chartLuasPanenKacangHijau = new Chart(luasPanenKacangHijau, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kacang Hijau/Green Beans']))
                @foreach($padipalawijas['Kacang Hijau/Green Beans'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($padipalawijas['Kacang Hijau/Green Beans']))
                    @foreach($padipalawijas['Kacang Hijau/Green Beans'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiKacangHijau = document.getElementById('chartProduksiKacangHijau');
    var chartProduksiKacangHijau = new Chart(produksiKacangHijau, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kacang Hijau/Green Beans']))
                @foreach($padipalawijas['Kacang Hijau/Green Beans'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ton)',
                data: [
                @if(!empty($padipalawijas['Kacang Hijau/Green Beans']))
                    @foreach($padipalawijas['Kacang Hijau/Green Beans'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kacang Tanah / Peanuts
    
    var luasTanamKacangTanah = document.getElementById('chartLuasTanamKacangTanah');
    var chartLuasTanamKacangTanah = new Chart(luasTanamKacangTanah, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kacang Tanah/Peanuts']))
                @foreach($padipalawijas['Kacang Tanah/Peanuts'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Tanam(Ha)',
                data: [
                @if(!empty($padipalawijas['Kacang Tanah/Peanuts']))
                    @foreach($padipalawijas['Kacang Tanah/Peanuts'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_tanam']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var luasPanenKacangTanah = document.getElementById('chartLuasPanenKacangTanah');
    var chartLuasPanenKacangTanah = new Chart(luasPanenKacangTanah, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kacang Tanah/Peanuts']))
                @foreach($padipalawijas['Kacang Tanah/Peanuts'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($padipalawijas['Kacang Tanah/Peanuts']))
                    @foreach($padipalawijas['Kacang Tanah/Peanuts'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiKacangTanah = document.getElementById('chartProduksiKacangTanah');
    var chartProduksiKacangTanah = new Chart(produksiKacangTanah, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Kacang Tanah/Peanuts']))
                @foreach($padipalawijas['Kacang Tanah/Peanuts'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ton)',
                data: [
                @if(!empty($padipalawijas['Kacang Tanah/Peanuts']))
                    @foreach($padipalawijas['Kacang Tanah/Peanuts'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['tahun']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Ubi Jalar / Sweet Potato

    var luasTanamUbiJalar = document.getElementById('chartLuasTanamUbiJalar');
    var chartLuasTanamUbiJalar = new Chart(luasTanamUbiJalar, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Ubi Jalar/Sweet Potato']))
                @foreach($padipalawijas['Ubi Jalar/Sweet Potato'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Tanam(Ha)',
                data: [
                @if(!empty($padipalawijas['Ubi Jalar/Sweet Potato']))
                    @foreach($padipalawijas['Ubi Jalar/Sweet Potato'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_tanam']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var luasPanenUbiJalar = document.getElementById('chartLuasPanenUbiJalar');
    var chartLuasPanenUbiJalar = new Chart(luasPanenUbiJalar, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Ubi Jalar/Sweet Potato']))
                @foreach($padipalawijas['Ubi Jalar/Sweet Potato'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($padipalawijas['Ubi Jalar/Sweet Potato']))
                    @foreach($padipalawijas['Ubi Jalar/Sweet Potato'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiUbiJalar = document.getElementById('chartProduksiUbiJalar');
    var chartProduksiUbiJalar = new Chart(produksiUbiJalar, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($padipalawijas['Ubi Jalar/Sweet Potato']))
                @foreach($padipalawijas['Ubi Jalar/Sweet Potato'] as $padipalawija)
                    <?php  echo json_encode($padipalawija['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ton)',
                data: [
                @if(!empty($padipalawijas['Ubi Jalar/Sweet Potato']))
                    @foreach($padipalawijas['Ubi Jalar/Sweet Potato'] as $padipalawija)
                        <?php  echo json_encode($padipalawija['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Bawang Merah / Shallots

    var luasPanenBawang = document.getElementById('chartLuasPanenBawang');
    var chartLuasPanenBawang = new Chart(luasPanenBawang, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Bawang Merah/ Shallots']))
                @foreach($sayuranbuahs['Bawang Merah/ Shallots'] as $sayuranbuah)
                    <?php  echo json_encode($sayuranbuah['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Bawang Merah/ Shallots']))
                    @foreach($sayuranbuahs['Bawang Merah/ Shallots'] as $sayuranbuah)
                        <?php  echo json_encode($sayuranbuah['luas_tanam']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiBawang = document.getElementById('chartProduksiBawang');
    var chartProduksiBawang = new Chart(produksiBawang, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Bawang Merah/ Shallots']))
                @foreach($sayuranbuahs['Bawang Merah/ Shallots'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Bawang Merah/ Shallots']))
                    @foreach($sayuranbuahs['Bawang Merah/ Shallots'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

//Cabai Besar/ Chili/Big Chilli

    var luasPanenCabaiBesar = document.getElementById('chartLuasPanenCabaiBesar');
    var chartLuasPanenCabaiBesar = new Chart(luasPanenCabaiBesar, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Cabai Besar/ Chili/Big chili']))
                @foreach($sayuranbuahs['Cabai Besar/ Chili/Big chili'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Cabai Besar/ Chili/Big chili']))
                    @foreach($sayuranbuahs['Cabai Besar/ Chili/Big chili'] as $sayuran)
                        <?php  echo json_encode($sayuran['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiCabaiBesar = document.getElementById('chartProduksiCabaiBesar');
    var chartProduksiCabaiBesar = new Chart(produksiCabaiBesar, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Cabai Besar/ Chili/Big chili']))
                @foreach($sayuranbuahs['Cabai Besar/ Chili/Big chili'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Cabai Besar/ Chili/Big chili']))
                    @foreach($sayuranbuahs['Cabai Besar/ Chili/Big chili'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

//Cabai Rawit/ Chili/Cayenne Pepper

    var luasPanenCabaiRawit = document.getElementById('chartLuasPanenCabaiRawit');
    var chartLuasPanenCabaiRawit = new Chart(luasPanenCabaiRawit, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper']))
                @foreach($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper']))
                    @foreach($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper'] as $sayuran)
                        <?php  echo json_encode($sayuran['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiCabaiRawit = document.getElementById('chartProduksiCabaiRawit');
    var chartProduksiCabaiRawit = new Chart(produksiCabaiRawit, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper']))
                @foreach($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper']))
                    @foreach($sayuranbuahs['Cabai Rawit/ Chili/Cayenne Pepper'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kacang Panjang/Long Beans

    var luasPanenKacangPnjng = document.getElementById('chartLuasPanenKacangPnjng');
    var chartLuasPanenKacangPnjng = new Chart(luasPanenKacangPnjng, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Kacang Panjang/ Long Beans']))
                @foreach($sayuranbuahs['Kacang Panjang/ Long Beans'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Kacang Panjang/ Long Beans']))
                    @foreach($sayuranbuahs['Kacang Panjang/ Long Beans'] as $sayuran)
                        <?php  echo json_encode($sayuran['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiKacangPnjng = document.getElementById('chartProduksiKacangPnjng');
    var chartProduksiKacangPnjng = new Chart(produksiKacangPnjng, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Kacang Panjang/ Long Beans']))
                @foreach($sayuranbuahs['Kacang Panjang/ Long Beans'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Kacang Panjang/ Long Beans']))
                    @foreach($sayuranbuahs['Kacang Panjang/ Long Beans'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kangkung/ Water Spinach 

    var luasPanenKangkung = document.getElementById('chartLuasPanenKangkung');
    var chartLuasPanenKangkung = new Chart(luasPanenKangkung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Kangkung/ Water Spinach']))
                @foreach($sayuranbuahs['Kangkung/ Water Spinach'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Kangkung/ Water Spinach']))
                    @foreach($sayuranbuahs['Kangkung/ Water Spinach'] as $sayuran)
                        <?php  echo json_encode($sayuran['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiKangkung = document.getElementById('chartProduksiKangkung');
    var chartProduksiKangkung = new Chart(produksiKangkung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Kangkung/ Water Spinach']))
                @foreach($sayuranbuahs['Kangkung/ Water Spinach'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Kangkung/ Water Spinach']))
                    @foreach($sayuranbuahs['Kangkung/ Water Spinach'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Ketimun/ Cucumber

    var luasPanenKetimun = document.getElementById('chartLuasPanenKetimun');
    var chartLuasPanenKetimun = new Chart(luasPanenKetimun, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Ketimun/ Cucumber']))
                @foreach($sayuranbuahs['Ketimun/ Cucumber'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Ketimun/ Cucumber']))
                    @foreach($sayuranbuahs['Ketimun/ Cucumber'] as $sayuran)
                        <?php  echo json_encode($sayuran['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiKetimun = document.getElementById('chartProduksiKetimun');
    var chartProduksiKetimun = new Chart(produksiKetimun, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Ketimun/ Cucumber']))
                @foreach($sayuranbuahs['Ketimun/ Cucumber'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Ketimun/ Cucumber']))
                    @foreach($sayuranbuahs['Ketimun/ Cucumber'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Semangka/ Water Melon

    var luasPanenSemangka = document.getElementById('chartLuasPanenSemangka');
    var chartLuasPanenSemangka = new Chart(luasPanenSemangka, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Semangka/ Water Melon (kw/ qui)']))
                @foreach($sayuranbuahs['Semangka/ Water Melon (kw/ qui)'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Semangka/ Water Melon (kw/ qui)']))
                    @foreach($sayuranbuahs['Semangka/ Water Melon (kw/ qui)'] as $sayuran)
                        <?php  echo json_encode($sayuran['tahun']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiSemangka = document.getElementById('chartProduksiSemangka');
    var chartProduksiSemangka = new Chart(produksiSemangka, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Semangka/ Water Melon (kw/ qui)']))
                @foreach($sayuranbuahs['Semangka/ Water Melon (kw/ qui)'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Semangka/ Water Melon (kw/ qui)']))
                    @foreach($sayuranbuahs['Semangka/ Water Melon (kw/ qui)'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Terung/ Eggplant

    var luasPanenTerung = document.getElementById('chartLuasPanenTerung');
    var chartLuasPanenTerung = new Chart(luasPanenTerung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Terung/ Eggplant']))
                @foreach($sayuranbuahs['Terung/ Eggplant'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas Panen(Ha)',
                data: [
                @if(!empty($sayuranbuahs['Terung/ Eggplant']))
                    @foreach($sayuranbuahs['Terung/ Eggplant'] as $sayuran)
                        <?php  echo json_encode($sayuran['luas_panen']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiTerung = document.getElementById('chartProduksiTerung');
    var chartProduksiTerung = new Chart(produksiTerung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($sayuranbuahs['Terung/ Eggplant']))
                @foreach($sayuranbuahs['Terung/ Eggplant'] as $sayuran)
                    <?php  echo json_encode($sayuran['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(kw/qu)',
                data: [
                @if(!empty($sayuranbuahs['Terung/ Eggplant']))
                    @foreach($sayuranbuahs['Terung/ Eggplant'] as $sayuran)
                        <?php  echo json_encode($sayuran['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kelapa / Coconut

    var luasArealKelapa = document.getElementById('chartLuasArealKelapa');
    var chartLuasArealKelapa = new Chart(luasArealKelapa, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($perkebunans['Kelapa / Coconut']))
                @foreach($perkebunans['Kelapa / Coconut'] as $perkebunan)
                    <?php  echo json_encode($perkebunan['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas(Ha)',
                data: [
                @if(!empty($perkebunans['Kelapa / Coconut']))
                    @foreach($perkebunans['Kelapa / Coconut'] as $perkebunan)
                        <?php  echo json_encode($perkebunan['luas_areal']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiKelapa = document.getElementById('chartProduksiKelapa');
    var chartProduksiKelapa = new Chart(produksiKelapa, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($perkebunans['Kelapa / Coconut']))
                @foreach($perkebunans['Kelapa / Coconut'] as $perkebunan)
                    <?php  echo json_encode($perkebunan['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(ton)',
                data: [
                @if(!empty($perkebunans['Kelapa / Coconut']))
                    @foreach($perkebunans['Kelapa / Coconut'] as $perkebunan)
                        <?php  echo json_encode($perkebunan['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Tebu / Sugar Cane
    
    var luasArealTebu = document.getElementById('chartLuasArealTebu');
    var chartLuasArealTebu = new Chart(luasArealTebu, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($perkebunans['Tebu / Sugar Cane']))
                @foreach($perkebunans['Tebu / Sugar Cane'] as $perkebunan)
                    <?php  echo json_encode($perkebunan['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Luas(Ha)',
                data: [
                @if(!empty($perkebunans['Tebu / Sugar Cane']))
                    @foreach($perkebunans['Tebu / Sugar Cane'] as $perkebunan)
                        <?php  echo json_encode($perkebunan['luas_areal']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

    var produksiTebu = document.getElementById('chartProduksiTebu');
    var chartProduksiTebu = new Chart(produksiTebu, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($perkebunans['Tebu / Sugar Cane']))
                @foreach($perkebunans['Tebu / Sugar Cane'] as $perkebunan)
                    <?php  echo json_encode($perkebunan['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(ton)',
                data: [
                @if(!empty($perkebunans['Tebu / Sugar Cane']))
                    @foreach($perkebunans['Tebu / Sugar Cane'] as $perkebunan)
                        <?php  echo json_encode($perkebunan['produksi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Sapi Perah / Dairy Cattle

    var sapiPerah = document.getElementById('chartSapiPerah');
    var chartSapiPerah = new Chart(sapiPerah, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($ternaks['Sapi Perah / Dairy Cattle']))
                @foreach($ternaks['Sapi Perah / Dairy Cattle'] as $ternak)
                    <?php  echo json_encode($ternak['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($ternaks['Sapi Perah / Dairy Cattle']))
                    @foreach($ternaks['Sapi Perah / Dairy Cattle'] as $ternak)
                        <?php  echo json_encode($ternak['jumlah_populasi']); ?>
                    @endforeach
                @else
                    '',
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Sapi Potong / Beef Cattle

    var sapiPotong = document.getElementById('chartSapiPotong');
    var chartSapiPotong = new Chart(sapiPotong, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($ternaks['Sapi Potong / Beef Cattle']))
                @foreach($ternaks['Sapi Potong / Beef Cattle'] as $ternak)
                    <?php  echo json_encode($ternak['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($ternaks['Sapi Potong / Beef Cattle']))
                    @foreach($ternaks['Sapi Potong / Beef Cattle'] as $ternak)
                        <?php  echo json_encode($ternak['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kerbau / Buffalo

    var kerbau = document.getElementById('chartKerbau');
    var chartKerbau = new Chart(kerbau, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($ternaks['Sapi Potong / Beef Cattle']))
                @foreach($ternaks['Sapi Potong / Beef Cattle'] as $ternak)
                    <?php  echo json_encode($ternak['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($ternaks['Sapi Potong / Beef Cattle']))
                    @foreach($ternaks['Sapi Potong / Beef Cattle'] as $ternak)
                        <?php  echo json_encode($ternak['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kuda / Horse

    var kuda = document.getElementById('chartKuda');
    var chartKuda = new Chart(kuda, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($ternaks['Kuda / Horse']))
                @foreach($ternaks['Kuda / Horse'] as $ternak)
                    <?php  echo json_encode($ternak['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($ternaks['Kuda / Horse']))
                    @foreach($ternaks['Kuda / Horse'] as $ternak)
                        <?php  echo json_encode($ternak['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kambing / Goat

    var kambing = document.getElementById('chartKambing');
    var chartKambing = new Chart(kambing, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($ternaks['Kambing / Goat']))
                @foreach($ternaks['Kambing / Goat'] as $ternak)
                    <?php  echo json_encode($ternak['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($ternaks['Kambing / Goat']))
                    @foreach($ternaks['Kambing / Goat'] as $ternak)
                        <?php  echo json_encode($ternak['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Domba / Sheep

    var domba = document.getElementById('chartDomba');
    var chartDomba = new Chart(domba, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($ternaks['Domba / Sheep']))
                @foreach($ternaks['Domba / Sheep'] as $ternak)
                    <?php  echo json_encode($ternak['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($ternaks['Domba / Sheep']))
                    @foreach($ternaks['Domba / Sheep'] as $ternak)
                        <?php  echo json_encode($ternak['jumlah_populasi']); ?>
                    @endforeach
                @else
                    '',
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Ayam Kampung / Native Chicken

    var ayamKampung = document.getElementById('chartAyamKampung');
    var chartAyamKampung = new Chart(ayamKampung, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($unggas['Ayam Kampung / Native Chicken']))
                @foreach($unggas['Ayam Kampung / Native Chicken'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($unggas['Ayam Kampung / Native Chicken']))
                    @foreach($unggas['Ayam Kampung / Native Chicken'] as $data)
                        <?php  echo json_encode($data['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Ayam Petelur / Layer

    var ayamPetelur = document.getElementById('chartAyamPetelur');
    var chartAyamPetelur = new Chart(ayamPetelur, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($unggas['Ayam Petelur / Layer']))
                @foreach($unggas['Ayam Petelur / Layer'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($unggas['Ayam Petelur / Layer']))
                    @foreach($unggas['Ayam Petelur / Layer'] as $data)
                        <?php  echo json_encode($data['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Ayam Pedaging /Boiler
    
    var ayamPedaging = document.getElementById('chartAyamPedaging');
    var chartAyamPedaging = new Chart(ayamPedaging, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($unggas['Ayam Pedaging / Broiler']))
                @foreach($unggas['Ayam Pedaging / Broiler'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($unggas['Ayam Pedaging / Broiler']))
                    @foreach($unggas['Ayam Pedaging / Broiler'] as $data)
                        <?php  echo json_encode($data['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Itik Manila / Muscovy Duck

    var itikManila = document.getElementById('chartItikManila');
    var chartItikManila = new Chart(itikManila, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($unggas['Itik Manila / Muscovy Duck']))
                @foreach($unggas['Itik Manila / Muscovy Duck'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($unggas['Itik Manila / Muscovy Duck']))
                    @foreach($unggas['Itik Manila / Muscovy Duck'] as $data)
                        <?php  echo json_encode($data['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Itik / Duck

    var itik = document.getElementById('chartItik');
    var chartItik = new Chart(itik, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($unggas['Itik / Duck']))
                @foreach($unggas['Itik / Duck'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($unggas['Itik / Duck']))
                    @foreach($unggas['Itik / Duck'] as $data)
                        <?php  echo json_encode($data['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Merpati / Dove

    var merpati = document.getElementById('chartMerpati');
    var chartMerpati = new Chart(merpati, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($unggas['Merpati / Dove']))
                @foreach($unggas['Merpati / Dove'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($unggas['Merpati / Dove']))
                    @foreach($unggas['Merpati / Dove'] as $data)
                        <?php  echo json_encode($data['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Puyuh / Quail

    var puyuh = document.getElementById('chartPuyuh');
    var chartPuyuh = new Chart(puyuh, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($unggas['Puyuh / Quail']))
                @foreach($unggas['Puyuh / Quail'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Populasi',
                data: [
                @if(!empty($unggas['Puyuh / Quail']))
                    @foreach($unggas['Puyuh / Quail'] as $data)
                        <?php  echo json_encode($data['jumlah_populasi']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Nelayan Penuh / Full Time

    var nelayanPenuh = document.getElementById('chartNelayanPenuh');
    var chartNelayanPenuh = new Chart(nelayanPenuh, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($nelayans['Nelayan Penuh / Full Time']))
                @foreach($nelayans['Nelayan Penuh / Full Time'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                @if(!empty($nelayans['Nelayan Penuh / Full Time']))
                    @foreach($nelayans['Nelayan Penuh / Full Time'] as $data)
                        <?php  echo json_encode($data['jumlah_nelayan']); ?>
                    @endforeach
                @else
                0,
            @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Nelayan Sambilan Utama / Part Time

    var nelayanSambilan = document.getElementById('chartNelayanSambilan');
    var chartNelayanSambilan = new Chart(nelayanSambilan, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($nelayans['Nelayan Sambilan Utama / Part Time']))
                @foreach($nelayans['Nelayan Sambilan Utama / Part Time'] as $data)
                    <?php  echo json_encode($data['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                @if(!empty($nelayans['Nelayan Sambilan Utama / Part Time']))
                    @foreach($nelayans['Nelayan Sambilan Utama / Part Time'] as $data)
                        <?php  echo json_encode($data['jumlah_nelayan']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

//  Kapal < 5GT

    var kapalKurangLimaGt = document.getElementById('chartKapalKurangLimaGt');
    var chartKapalKurangLimaGt = new Chart(kapalKurangLimaGt, {
        type: 'bar',
        data: {
            labels: [
                @if(!empty($kapals['< 5GT']))
                    @foreach($kapals['< 5GT'] as $kapal)
                        <?php  echo json_encode($kapal['tahun']); ?>
                    @endforeach
                @else
                    '',
                @endif
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                @if(!empty($kapals['< 5GT']))
                    @foreach($kapals['< 5GT'] as $kapal)
                        <?php  echo json_encode($kapal['jumlah_kapal']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kapal 5 - 10 GT

    var kapalLimaSampaiSepuluhGt = document.getElementById('chartKapalLimaSampaiSepuluhGt');
    var chartKapalLimaSampaiSepuluhGt = new Chart(kapalLimaSampaiSepuluhGt, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($kapals['5 - 10 GT']))
                @foreach($kapals['5 - 10 GT'] as $kapal)
                    <?php  echo json_encode($kapal['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                @if(!empty($kapals['5 - 10 GT']))
                    @foreach($kapals['5 - 10 GT'] as $kapal)
                        <?php  echo json_encode($kapal['jumlah_kapal']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Budidaya Laut / Marine Culture

    var budidayaLaut = document.getElementById('chartBudidayaLaut');
    var chartBudidayaLaut = new Chart(budidayaLaut, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($budidayas['Budidaya Laut / Marine Culture']))
                @foreach($budidayas['Budidaya Laut / Marine Culture'] as $budidaya)
                    <?php  echo json_encode($budidaya['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                @if(!empty($budidayas['Budidaya Laut / Marine Culture']))
                    @foreach($budidayas['Budidaya Laut / Marine Culture'] as $budidaya)
                        <?php  echo json_encode($budidaya['jumlah_budidaya']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Tambak Brackish / Water Pond 

    var budidayaTambak = document.getElementById('chartBudidayaTambak');
    var chartBudidayaTambak = new Chart(budidayaTambak, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($budidayas['Tambak Brackish / Water Pond']))
                @foreach($budidayas['Tambak Brackish / Water Pond'] as $budidaya)
                    <?php  echo json_encode($budidaya['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                @if(!empty($budidayas['Tambak Brackish / Water Pond']))
                    @foreach($budidayas['Tambak Brackish / Water Pond'] as $budidaya)
                        <?php  echo json_encode($budidaya['jumlah_budidaya']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Kolam Fresh / Water Pond

    var budidayaKolam = document.getElementById('chartBudidayaKolam');
    var chartBudidayaKolam = new Chart(budidayaKolam, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($budidayas['Kolam Fresh / Water Pond']))
                @foreach($budidayas['Kolam Fresh / Water Pond'] as $budidaya)
                    <?php  echo json_encode($budidaya['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                @if(!empty($budidayas['Kolam Fresh / Water Pond']))
                    @foreach($budidayas['Kolam Fresh / Water Pond'] as $budidaya)
                        <?php  echo json_encode($budidaya['jumlah_budidaya']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Petambak (Orang) / Salt Farmers (People)

    var petambakGaram = document.getElementById('chartPetambakGaram');
    var chartPetambakGaram = new Chart(petambakGaram, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($garams['Petambak (Orang) / Salt Farmers (People)']))
                @foreach($garams['Petambak (Orang) / Salt Farmers (People)'] as $garam)
                    <?php  echo json_encode($garam['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: 'Orang',
                data: [
                @if(!empty($garams['Petambak (Orang) / Salt Farmers (People)']))
                    @foreach($garams['Petambak (Orang) / Salt Farmers (People)'] as $garam)
                        <?php  echo json_encode($garam['Jumlah']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Luas Lahan (ha) / Land Area (ha)

    var luasLahanGaram = document.getElementById('chartLuasLahanGaram');
    var chartLuasLahanGaram = new Chart(luasLahanGaram, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($garams['Luas Lahan (ha) / Land Area (ha)']))
                @foreach($garams['Luas Lahan (ha) / Land Area (ha)'] as $garam)
                    <?php  echo json_encode($garam['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ha)',
                data: [
                @if(!empty($garams['Luas Lahan (ha) / Land Area (ha)']))
                    @foreach($garams['Luas Lahan (ha) / Land Area (ha)'] as $garam)
                        <?php  echo json_encode($garam['Jumlah']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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

// Produksi (ton) / Production (ton)

    var produksiGaram = document.getElementById('chartProduksiGaram');
    var chartProduksiGaram = new Chart(produksiGaram, {
        type: 'bar',
        data: {
            labels: [
            @if(!empty($garams['Produksi (ton) / Production (ton)']))
                @foreach($garams['Produksi (ton) / Production (ton)'] as $garam)
                    <?php  echo json_encode($garam['tahun']); ?>
                @endforeach
            @else
                '',
            @endif
            ],
            datasets: [{
                label: '(Ha)',
                data: [
                @if(!empty($garams['Produksi (ton) / Production (ton)']))
                    @foreach($garams['Produksi (ton) / Production (ton)'] as $garam)
                        <?php  echo json_encode($garam['Jumlah']); ?>
                    @endforeach
                @else
                    0,
                @endif
                ],
                backgroundColor: [
                    'rgba(95, 150, 198, 1)',
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
</script>
@endsection
