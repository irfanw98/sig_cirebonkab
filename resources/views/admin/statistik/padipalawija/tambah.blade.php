<form action="" method="post" autocomplete="off" class="formInsertPadipalawija">
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
                    <option value="Jagung/Maize">Jagung/Maize</option>
                    <option value="Kacang Hijau/Green Beans">Kacang Hijau/Green Beans</option>
                    <option value="Kacang Tanah/Peanuts">Kacang Tanah/Peanuts</option>
                    <option value="Kedelai/Soy">Kedelai/Soy</option>
                    <option value="Padi Sawah/Paddy Rice">Padi Sawah/Paddy Rice</option>
                    <option value="Ubi Jalar/Sweet Potato">Ubi Jalar/Sweet Potato</option>
                    <option value="Ubi Kayu/Cassava">Ubi Kayu/Cassava</option>
                </select>

                <span class="text-danger" id="jenis_tanamanError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="luas_tanam">Luas Tanam (Ha):</label>
                <input type="text" class="form-control" id="luas_tanam" name="luas_tanam">

                <span class="text-danger" id="luas_tanamError"></span>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="luas_panen">Luas Penen (Ha):</label>
                <input type="text" class="form-control" id="luas_panen" name="luas_panen">

                <span class="text-danger" id="luas_panenError"></span>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="produksi">Produksi (Ton):</label>
                <input type="text" class="form-control" id="produksi" name="produksi">

                <span class="text-danger" id="produksiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonPadipalawija">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonPadipalawija" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>