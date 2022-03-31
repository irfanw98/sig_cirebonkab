<form action="" method="post" autocomplete="off" class="formInsertPerkebunan">
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
                    <option value="Kelapa / Coconut">Kelapa / Coconut</option>
                    <option value="Tebu / Sugar Cane">Tebu / Sugar Cane</option>
                </select>

                <span class="text-danger" id="jenis_tanamanError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="luas_areal">Luas Areal Tanaman (Ha):</label>
                <input type="text" class="form-control" id="luas_areal" name="luas_areal">

                <span class="text-danger" id="luas_arealError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="produksi">Produksi (Ton):</label>
                <input type="text" class="form-control" id="produksi" name="produksi">

                <span class="text-danger" id="produksiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonPerkebunan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonPerkebunan" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>