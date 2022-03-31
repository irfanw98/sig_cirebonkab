<form action="" method="post" autocomplete="off" class="formInsertSayuranbuah">
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id">

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
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun">

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
                    <option value="Bawang Merah/ Shallots">Bawang Merah/ Shallots</option>
                    <option value="Cabai Besar/ Chili/Big chili">Cabai Besar/ Chili/Big chili</option>
                    <option value="Cabai Rawit/ Chili/Cayenne Pepper">Cabai Rawit/ Chili/Cayenne Pepper</option>
                    <option value="Kacang Panjang/ Long Beans">Kacang Panjang/ Long Beans</option>
                    <option value="Kangkung/ Water Spinach">Kangkung/ Water Spinach</option>
                    <option value="Ketimun/ Cucumber">Ketimun/ Cucumber</option>
                    <option value="Semangka/ Water Melon (kw/ qui)">Semangka/ Water Melon (kw/ qui)</option>
                    <option value="Terung/ Eggplant">Terung/ Eggplant</option>
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
                <input type="text" class="form-control" id="luas_panen" name="luas_panen">

                <span class="text-danger" id="luas_panenError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="produksi">Produksi (Kw/qu):</label>
                <input type="text" class="form-control" id="produksi" name="produksi">

                <span class="text-danger" id="produksiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonSayuranbuah">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonSayuranbuah" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>