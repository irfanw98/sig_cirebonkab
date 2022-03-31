@extends('frontend_master')

@section('content')
<!-- Jumbotron -->
<div class="jumbotron">
    <div class="container">
        <div class="row justify-content-between align-items-center mt-5">
            <div class="col-md-6 col-lg-7 text-center text-md-left mb-5 welcome">
                <h2 class="mb-3">
                    Selamat Datang Di Sistem Informasi Geografis <span>Statistik</span> Dan Persebaran <span>Desa</span> Di Kabupaten Cirebon
                </h2>
                <a class="btn btn-success btn-md" href="#map" role="button" style="padding: 10px"><i class="fas fa-map-marker-alt"></i> Lihat persebaran</a>
            </div>
            <div class="col-md-6 col-lg-5 mb-5">
                <div class="jumbotron__img">
                    <img src="{{ asset('img/world.svg') }}" class="img-fluid" alt="jumbotron-img" width="500px">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Jumbotron -->


<!-- Statistik & Desa -->
<section class="about">
    <div class="container">
        <div class="row justify-content-between align-items-center flex-column-reverse flex-sm-row">
            <div class="col-sm-6 col-md-6 col-lg-5 img-statistik">
                <div class="statistik__img">
                    <img src="{{ asset('img/img-statistik.svg') }}" class="img-fluid" alt="statistik-img" data-aos="fade-right" data-aos-delay="300">
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 text-center text-md-left statistik">
                <div class="featur-detail">
                    <h2>Apa itu <span>Statistik?</span></h2>
                    <p class="featur-line"></p>
                    <p class="lead mb-5 mt-3 text-left text-secondary">
                        Statistik adalah data yang diperoleh dengan cara pengumpulan, pengolahan, penyajian, dan analisis serta sebagai sistem yang mengatur keterkaitan antar unsur dalam penyelenggaraan statistik.
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 col-lg-6 text-center text-md-left desa">
                <div class="featur-detail">
                    <h2>Apa itu <span>desa?</span></h2>
                    <p class="featur-line"></p>
                    <p class="lead mb-5 mt-3 text-left text-secondary">
                        <!-- Menurut Bintarto -->
                        Desa adalah hasil perpaduan kegiatan sekelompok masyarakat dan lingkungannya. Hasil dari perpaduan tersebut tampak pada unsur-unsur fisiografis, sosial, ekonomi, politik dan budaya yang saling berinteraksi maupun dalam hubungannya dengan wilayah lain.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 img-desa">
                <div class="desa__img">
                    <img src="{{ asset('img/desa.svg') }}" class="img-fluid" alt="desa-img" data-aos="fade-left">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Statistik & Desa -->


<!-- SIG Statistik & Persebaran Desa -->
<section class="sig" style="background-image: url('{{asset('img/maps.png')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center text-md-left sig-isi">
                <p class="text-center">
                    Sistem Informasi Geografis Statistik Dan Persebaran Desa adalah suatu sistem informasi yang menyajikan peta digital berbasis website untuk menampilkan informasi statistik dan mengetahui lokasi persebaran desa di Kabupaten Cirebon
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End SIG Statistik & Persebaran Desa -->


<!-- Konten Statistik -->
<section class="konten">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mt-2 title">
                <h2><span>Konten</span> Statistik</h2>
                <p class="line"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card__img text-center">
                        <img src="{{ asset('img/Bab_1.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card2__img text-center">
                        <img src="{{ asset('img/Bab_2.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card2__img text-center">
                        <img src="{{ asset('img/Bab_3.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card2__img text-center">
                        <img src="{{ asset('img/Bab_4.png') }}" alt="card" width="370px" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card2__img text-center">
                        <img src="{{ asset('img/Bab_5.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card2__img text-center">
                        <img src="{{ asset('img/Bab_6.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card__img text-center">
                        <img src="{{ asset('img/Bab_7.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card2__img text-center">
                        <img src="{{ asset('img/Bab_8.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card service-card">
                    <div class="service-card2__img text-center">
                        <img src="{{ asset('img/Bab_9.png') }}" alt="card" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Konten Statistik -->

<!-- Maps -->
<div id="body">
    <section class="content-wrapper main-content clear-fix">
        <div id="map"></div>
    </section>
</div>
<!-- End Maps -->
@endsection

@section('script')
<script type="text/javascript">
    // Animasi AOS
    AOS.init({
        once: true,
        duration: 1000,
    });


    //Base Map
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    })

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    })

    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    })

    @foreach($desas as $desa)
    var desa{{ $desa->id_desa}} = L.layerGroup()
    @endforeach

    var map = L.map('map', {
        center: [-6.764873382739381, 108.47858011722566],
        zoom: 12,
        layers: [peta1,
            @foreach($desas as $desa)
                desa{{ $desa->id_desa}},
            @endforeach
        ]
    })

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3
    }

    var overLayer = {
        @foreach($desas as $desa)
        "{{ $desa->nama_desa }}": desa{{ $desa->id_desa}},
        @endforeach
    }

    L.control.layers(baseMaps, overLayer).addTo(map)

    //Batas  Wilayah
    @foreach($desas as $desa)
    var batasWilayahDesa = L.geoJSON(<?= $desa->geojson  ?>, {
            style: {
                color: 'white',
                fillColor: '{{ $desa->warna_wilayah_desa }}',
                fillOpacity: 0.7,
            },
        })
        .addTo(desa{{ $desa -> id_desa}})
        .bindTooltip("{{ $desa->nama_desa }}", {
            permanent: true,
            direction: "center"
        })
    @endforeach

    //titik koordinat kantor desa
    @foreach($desas as $desa)
    var iconDesa = L.icon({
        iconUrl: '{{ asset('img/lokasiDesa.png') }}',
        iconSize: [38, 55],
    });
    var markerKantorDesa = L.marker([{{ $desa->latitude}}, {{ $desa->longitude }}], {icon: iconDesa})
        .addTo(map)
        .bindPopup(`<div class="card" style="border: none;">
           <img src="{{ asset('storage/desa') }}/{{ $desa->foto }}" width="100%" height="150px" class="image-desa" alt="img-desa">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $desa->nama_desa }}</h5>
              <a href="{{ url('/desa') }}/{{ $desa->id_desa }}" class="btn btn-sm btn-primary" style="text-decoration: none; color:#fff;">
                <i class="fas fa-info-circle"></i> Detail
              </a>
              <a href="{{ url('/statistik') }}/{{ $desa->id_desa }}" class="btn btn-sm btn-success" style="text-decoration: none; color:#fff;">
                <i class="nav-icon fas fa-chart-bar"></i> Statistik
              </a>
            </div>
        </div>`)

    markerKantorDesa.on('mouseover', function() {
        this.openPopup()
    })
    @endforeach
</script>
@endsection