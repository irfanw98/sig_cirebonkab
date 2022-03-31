<form action="" method="post" autocomplete="off" class="formInsertWisata" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="nama_wisata">Nama Wisata :</label>
                <input type="text" class="form-control" id="nama_wisata" name="nama_wisata">

                <span class="text-danger" id="nama_wisataError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->kode_kecamatan }}">{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_desa">Desa :</label>
                <select class="select2multiple form-control" name="id_desa" id="id_desa">
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                        <option value="{{ $desa->id_desa }}">{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="id_desaError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="foto">Upload Foto :</label>
                <input type="file" id="foto" name="foto" class="form-control">

                <span class="text-danger" id="fotoError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="latitude">Latitude :</label>
                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="latitude">

                <span class="text-danger" id="latitudeError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="longitude">Longitude :</label>
                <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude">

                <span class="text-danger" id="longitudeError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="map">Map</label><label class="text-danger">(Klik atau drag&drop marker untuk menentukan posisi wisata)</label>
            <div id="map" style="width: 100%; height: 300px;"></div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonWisata">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonWisata"data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })

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

    var map = L.map('map', {
            center: [-6.764873382739381, 108.47858011722566],
            zoom: 14,
            layers: [peta1]
    })

    var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
            "Streets": peta3
        };

    L.control.layers(baseMaps).addTo(map)

    //Mengambil titik koordinat
    var curLocation = [-6.764873382739381, 108.47858011722566]
    map.attributionControl.setPrefix(false)

    var marker = new L.marker(curLocation, {
        draggable: 'true',
    })

    map.addLayer(marker)

    //Mengambil koordinat saat marker di drag and drop
    marker.on('dragend', function(event) {
        var position = marker.getLatLng()
        marker.setLatLng(position, {
            draggable: 'true',
        }).bindPopup(position).update()
        $("#latitude").val(position.lat).keyup()
        $("#longitude").val(position.lng).keyup()
    })

    //Mengmbil koordinat saat map di klik
    var posisiLatitude = document.querySelector("[name=latitude]");
    var posisiLongitude = document.querySelector("[name=longitude]");
    map.on('click', function(event) {
        let lat = event.latlng.lat;
        let lng = event.latlng.lng;

        if (!marker) {
            marker = L.marker(event.latlng).addTo(map)
        } else {
            marker.setLatLng(event.latlng)
        }

        posisiLatitude.value = lat;
        posisiLongitude.value = lng;
    })
</script>