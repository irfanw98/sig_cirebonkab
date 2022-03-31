@extends('frontend_master')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/desa/style.css') }}">
@endsection

@section('content')
<!-- Maps -->
<div id="body">
    <section class="content-wrapper main-content clear-fix">
        <div id="map"></div>
    </section>
</div>
<!-- End Maps -->

<div id="desa">
    <section class="desa">
      <div class="col-md-12 col-lg-12">
         <div class="row">
           <div class="col-md-12 col-lg-12 text-center mt-3 mb-4">
            <h2>Desa <span>{{ $desa->nama_desa }}</span></h2>
            <p class="section-line"></p> 
           </div>
         </div>
         <div class="row justify-content-around mt-4">
           <div class="col-md-6 col-lg-6 mb-3 text-center img-desa">
              <img src="{{ asset('storage/desa') }}/{{ $desa->foto }}" class="img-fluid" alt="desa-img">
           </div>
           <div class="col-md-6 col-lg-5">
              <table class="table table-bordered">
               <thead>
                <tr>
                    <th width="200px">Kode Desa :</th>
                    <td>{{ $desa->kode_desa }}</td>
                </tr>
                <tr>
                    <th width="200px">Kecamatan :</th>
                    <td>{{ $desa->kecamatan->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <th>Warna Wilayah Desa :</th>
                    <td style="background-color: {{ $desa->warna_wilayah_desa }}"></td>
                </tr>
                <tr>
                    <th width="200px">Latitude :</th>
                    <td>{{ $desa->latitude }}</td>
                </tr>
                <tr>
                    <th width="200px">Longitude :</th>
                    <td>{{ $desa->longitude }}</td>
                </tr>
               </thead>
              </table>
              <div class="row">
                <div class="col-md-12 col-lg-12 text-center mb-2">
                  <a href="{{ url('/statistik') }}/{{ $desa->id_desa }}" class="btn btn-success p-2"><i class="nav-icon fas fa-chart-bar"></i> Lihat Statistik</a>
                </div>
              </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 col-lg-12 p-3 deskripsi-desa">
            <p>{!! $desa->deskripsi !!}</p>
           </div>
         </div>         
      </div>
    </section>
</div>
@endsection

@section('script')
<script type="text/javascript">
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

    var desa{{ $desa->id_desa}} = L.layerGroup()

    var map = L.map('map', {
        center: [-6.764873382739381, 108.47858011722566],
        zoom: 15,
        layers: [peta1, desa{{ $desa->id_desa}}]
    })

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Streets": peta3
    }

    var overLayer = {
        "{{ $desa->nama_desa }}": desa{{ $desa->id_desa}},
    }

    L.control.layers(baseMaps, overLayer).addTo(map)

    //Batas  Wilayah
    var batasWilayahDesa = L.geoJSON(<?= $desa->geojson  ?>, 
    {
        style: {
            color: 'white',
            fillColor: '{{ $desa->warna_wilayah_desa }}',
            fillOpacity: 0.7,
        },
    })
    .addTo(desa{{ $desa->id_desa}})
    .bindTooltip(`Desa {{ $desa->nama_desa }}`, {
        permanent: true,
        direction: "center"
    })

    map.fitBounds(batasWilayahDesa.getBounds())

    L.marker([-6.764873382739381, 108.47858011722566]).addTo(map);

    //titik koordinat kantor desa
    var iconKantorDesa = L.icon({
        iconUrl: '{{ asset('img/lokasiDesa.png') }}',
        iconSize: [38, 55],
    });
    var markerKantorDesa = L.marker([{{ $desa->latitude}}, {{ $desa->longitude }}], {icon: iconKantorDesa})
      .addTo(map)
      .bindTooltip(`Kantor Desa {{ $desa->nama_desa }}`, {
        permanent: true,
        direction: "center"
      })
      .bindPopup(`<div class="card" style="border: none;">
           <img src="{{ asset('storage/desa') }}/{{ $desa->foto }}" width="100%" height="150px" class="image-desa" alt="img-desa">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $desa->nama_desa }}</h5>
              <a class="btn btn-sm btn-warning" style="text-decoration: none; color:#fff;" onclick='return lihatRute({{ $desa->latitude}}, {{ $desa->longitude }})'>
                <i class="fas fa-info-circle"></i> Lihat Rute
              </a>
            </div>
        </div>`)

    markerKantorDesa.on('mouseover', function() {
        this.openPopup()
    })

    //Titik koordinat wisata
    @foreach($desa->wisata as $desa)
      var markerKantorDesa = L.marker([{{ $desa->latitude}}, {{ $desa->longitude }}])
      .addTo(map)
      .bindTooltip("{{ $desa->nama_wisata }}", {
        permanent: true,
        direction: "center"
      })
      .bindPopup(`<div class="card" style="border: none;">
           <img src="{{ asset('storage/wisata') }}/{{ $desa->foto }}" width="100%" height="150px" class="image-desa" alt="img-desa">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $desa->nama_wisata }}</h5>
              <a class="btn btn-sm btn-warning" style="text-decoration: none; color:#fff;" onclick='return lihatRute({{ $desa->latitude}}, {{ $desa->longitude }})'>
                <i class="fas fa-info-circle"></i> Lihat Rute
              </a>
            </div>
        </div>`)

      markerKantorDesa.on('mouseover', function() {
          this.openPopup()
      })
    @endforeach

    //Rute
    var control = L.Routing.control({
        waypoints: [
            L.latLng(-6.764873382739381, 108.47858011722566),
        ],
        geocoder: L.Control.Geocoder.nominatim(),
        routeWhileDragging: false,
        reverseWaypoints: true,
        showAlternatives: true,
        altLineOptions: {
          styles: [
            {color: 'black', opacity: 0.15, weight: 9},
            {color: 'white', opacity: 0.8, weight: 6},
            {color: 'green', opacity: 0.5, weight: 2}
          ]
        }
    })
    control.addTo(map);

    function lihatRute(lat,lng) {
      var latLng = L.latLng(lat, lng)
      control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng)
    }

</script>
@endsection
