<form action="" method="post" autocomplete="off" class="formEditKecamatan">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="kode_kecamatan">Kode :</label>
                <input type="text" class="form-control" name="kode_kecamatan" id="kode_kecamatan" value="{{ $kecamatan->kode_kecamatan }}" readonly required>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="nama_kecamatan">Nama :</label>
                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="{{ $kecamatan->nama_kecamatan }}">

                <span class="text-danger" id="nama_kecamatanError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="warna_wilayah_kecamatan">Warna Kecamatan :</label>

                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                    <input type="text" class="form-control" data-original-title="" title="" id="warna_wilayah_kecamatan" name="warna_wilayah_kecamatan" value="{{ $kecamatan->warna_wilayah_kecamatan }}">

                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square" style="color: {{ $kecamatan->warna_wilayah_kecamatan }}"></i></span>
                    </div>

                </div>
                <span class="text-danger" id="warna_wilayah_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Geojson :</label>
                <textarea name="geojson" rows="7" class="form-control" id="geojson">{{ $kecamatan->geojson }}</textarea>

                <span class="text-danger" id="geojsonError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonKecamatan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButton" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $('.my-colorpicker2').colorpicker();

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
</script>