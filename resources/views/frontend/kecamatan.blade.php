@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/kecamatan/style.css') }}">
@endsection

@section('content')
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

    var kecamatan{{ $kecamatan->kode_kecamatan}} = L.layerGroup()

    var map = L.map('map', {
        center: [-6.764873382739381, 108.47858011722566],
        zoom: 15,
        layers: [peta1, kecamatan{{ $kecamatan->kode_kecamatan}}]
    })

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3
    }

    var overLayer = {
        "{{ $kecamatan->nama_kecamatan }}": kecamatan{{ $kecamatan->kode_kecamatan}},
    }

    L.control.layers(baseMaps, overLayer).addTo(map)

    var batasWilayahKecamatan = L.geoJSON(<?= $kecamatan->geojson  ?>, 
    {
        style: {
            color: 'white',
            fillColor: '{{ $kecamatan->warna_wilayah_kecamatan }}',
            fillOpacity: 0.7,
        },
    })
    .addTo(kecamatan{{ $kecamatan -> kode_kecamatan}})
    .bindTooltip("{{ $kecamatan->nama_kecamatan }}", {
        permanent: true,
        direction: "center"
    })

    map.fitBounds(batasWilayahKecamatan.getBounds())

    @foreach($kecamatan->desa as $data)
    var iconKantorDesa = L.icon({
        iconUrl: '{{ asset('img/lokasiDesa.png') }}',
        iconSize: [38, 55],
    });
     var markerDesa = L.marker([{{ $data->latitude}}, {{ $data->longitude }}], {icon: iconKantorDesa})
     .addTo(map)
     .bindPopup(`<div class="card" style="border: none;">
           <img src="{{ asset('storage/desa') }}/{{ $data->foto }}" width="100%" height="150px" class="image-desa" alt="img-desa">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $data->nama_desa }}</h5>
              <a href="{{ url('/desa') }}/{{ $data->id_desa }}" class="btn btn-sm btn-primary" style="text-decoration: none; color:#fff;">
                <i class="fas fa-info-circle"></i> Detail
              </a>
              <a href="{{ url('/statistik') }}/{{ $data->id_desa }}" class="btn btn-sm btn-success" style="text-decoration: none; color:#fff;">
                <i class="nav-icon fas fa-chart-bar"></i> Statistik
              </a>
            </div>
        </div>`)

    markerDesa.on('mouseover', function() {
        this.openPopup()
    })
    @endforeach

</script>
@endsection
