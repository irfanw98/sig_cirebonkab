<form action="" method="post" autocomplete="off" class="formEditDesa" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_desa" id="id_desa" value="{{ $desa->id_desa }}">

            <div class="form-group">
                <label for="kode_desa">Kode Desa :</label>
                <input type="text" class="form-control" name="kode_desa" id="kode_desa" value="{{ $desa->kode_desa }}" readonly>

                <span class="text-danger" id="kode_desaError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_desa">Nama Desa:</label>
                <input type="text" class="form-control" id="nama_desa" name="nama_desa" value="{{ $desa->nama_desa }}">

                <span class="text-danger" id="nama_desaError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="kode_kecamatan">Kecamatan :</label>
                        <input class="form-control" name="kode_kecamatan" id="kode_kecamatan" value="{{ $desa->kode_kecamatan }}" readonly></input>
        
                        <span class="text-danger" id="kode_kecamatanError"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="warna_wilayah_desa">Warna Wilayah Desa :</label>
                        
                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                            <input type="text" class="form-control" data-original-title="" title="" id="warna_wilayah_desa" name="warna_wilayah_desa" value="{{ $desa->warna_wilayah_desa }}">

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square" style="color: {{ $desa->warna_wilayah_desa }}"></i></span>
                            </div>
                        </div>
                        <span class="text-danger" id="warna_wilayah_desaError"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <img src="{{ asset('storage/desa') }}/{{ $desa->foto }}" width="80px" class="mb-2">
                        <label for="foto">Upload Foto :</label>
                        <input type="file" id="foto" name="foto" class="form-control">
        
                        <span class="text-danger" id="fotoError"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="latitude">Latitude :</label>
                <input type="text" class="form-control" name="latitude" id="latitude_id" placeholder="latitude" value="{{ $desa->latitude }}">

                <span class="text-danger" id="latitudeError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="longitude">Longitude :</label>
                <input type="text" class="form-control" name="longitude" id="longitude_id" placeholder="Longitude" value="{{ $desa->longitude }}">

                <span class="text-danger" id="longitudeError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="map">Map</label><label class="text-danger">(Klik atau drag&drop marker untuk menentukan posisi desa)</label>
            <div id="mapid" style="width: 100%; height: 300px;"></div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="form-group">
                <label>Geojson :</label>
                <textarea name="geojson" rows="7" class="form-control">{{ $desa->geojson }}</textarea>

                <span class="text-danger" id="geojsonError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $desa->deskripsi }}">
                <trix-editor input="deskripsi"></trix-editor>

                <span class="text-danger" id="deskripsiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonDesa">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonDesa"data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    
$('.my-colorpicker2').colorpicker();

$('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
})

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


var map = L.map('mapid', {
        center: [{{ $desa->latitude }}, {{ $desa->longitude }}],
        zoom: 20,
        layers: [peta1]
})

var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3
}

L.control.layers(baseMaps).addTo(map)

//Mengambil titik koordinat
var curLocation = [{{ $desa->latitude }}, {{ $desa->longitude }}]
map.attributionControl.setPrefix(false)

var marker = new L.marker(curLocation, {
    draggable: 'true',
})

//Mengambil koordinat saat marker di drag and drop
marker.on('dragend', function(event) {
    var position = marker.getLatLng()
    marker.setLatLng(position, {
        draggable: 'true',
    }).bindPopup(position).update()
    $("#latitude_id").val(position.lat).keyup()
    $("#longitude_id").val(position.lng).keyup()
})

map.addLayer(marker)

//Mengmbil koordinat saat map di klik
var positionLatitude = document.querySelector("#latitude_id")
var positionLongitude = document.querySelector("#longitude_id")
map.on('click', function(event) {
    var lat = event.latlng.lat
    var lng = event.latlng.lng

    if (!marker) {
        marker = L.marker(event.latlng).addTo(map)
    } else {
        marker.setLatLng(event.latlng)
    }

    positionLatitude.value = lat;
    positionLongitude.value = lng;
})
</script>