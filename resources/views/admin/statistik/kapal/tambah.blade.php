<form action="" method="post" autocomplete="off" class="formInsertKapal">
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
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="kategori_kapal">Kategori kapal :</label>
                <select class="select2multiple form-control" name="kategori_kapal" id="kategori_kapal">
                    <option value="">-- Pilih Kategori Kapal --</option>
                    <option value="< 5GT">< 5GT</option>
                    <option value="5 - 10 GT">5 - 10 GT</option>
                </select>

                <span class="text-danger" id="kategori_kapalError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jumlah_kapal">Jumlah Kapal :</label>
                <input type="text" class="form-control" id="jumlah_kapal" name="jumlah_kapal">

                <span class="text-danger" id="jumlah_kapalError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonKapal">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonKapal" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>