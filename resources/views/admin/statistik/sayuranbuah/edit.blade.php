<form action="" method="post" autocomplete="off" class="formEditSayuranbuah">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $sayuranbuah->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($sayuranbuah->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $sayuranbuah->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                <label for="jenis_tanaman">Jenis tanaman :</label>
                <select class="select2multiple form-control" name="jenis_tanaman" id="jenis_tanaman">
                    <option value="">-- Pilih Jenis Tanaman --</option>
                    <option value="Bawang Merah/ Shallots" @if($sayuranbuah->jenis_tanaman == 'Bawang Merah/ Shallots') selected @endif>Bawang Merah/ Shallots</option>
                    <option value="Cabai Besar/ Chili/Big chili" @if($sayuranbuah->jenis_tanaman == 'Cabai Besar/ Chili/Big chili') selected @endif>Cabai Besar/ Chili/Big chili</option>
                    <option value="Cabai Rawit/ Chili/Cayenne Pepper" @if($sayuranbuah->jenis_tanaman == 'Cabai Rawit/ Chili/Cayenne Pepper') selected @endif>Cabai Rawit/ Chili/Cayenne Pepper</option>
                    <option value="Kacang Panjang/ Long Beans" @if($sayuranbuah->jenis_tanaman == 'Kacang Panjang/ Long Beans') selected @endif>Kacang Panjang/ Long Beans</option>
                    <option value="Kangkung/ Water Spinach" @if($sayuranbuah->jenis_tanaman == 'Kangkung/ Water Spinach') selected @endif>Kangkung/ Water Spinach</option>
                    <option value="Ketimun/ Cucumber" @if($sayuranbuah->jenis_tanaman == 'Ketimun/ Cucumber') selected @endif>Ketimun/ Cucumber</option>
                    <option value="Semangka/ Water Melon (kw/ qui)" @if($sayuranbuah->jenis_tanaman == 'Semangka/ Water Melon (kw/ qui)') selected @endif>Semangka/ Water Melon (kw/ qui)</option>
                    <option value="Terung/ Eggplant" @if($sayuranbuah->jenis_tanaman == 'Terung/ Eggplant') selected @endif>Terung/ Eggplant</option>
                </select>

                <span class="text-danger" id="jenis_tanamanError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="luas_panen">Luas Penen (Ha):</label>
                <input type="text" class="form-control" id="luas_panen" name="luas_panen" value="{{ $sayuranbuah->luas_panen }}">

                <span class="text-danger" id="luas_panenError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="produksi">Produksi (Kw/qu):</label>
                <input type="text" class="form-control" id="produksi" name="produksi" value="{{ $sayuranbuah->produksi }}">

                <span class="text-danger" id="produksiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonSayuranbuah">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonSayuranbuah" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>