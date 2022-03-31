<form action="" method="post" autocomplete="off" class="formInsertSumberairminum">
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
                <label for="sumber_air_minum">Sumber Air Minum:</label>
                <input type="text" class="form-control" id="sumber_air_minum" name="sumber_air_minum">

                <span class="text-danger" id="sumber_air_minumError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="banyak_air_minum">Banyak Sumber Air Minum :</label>
                <input type="text" class="form-control" id="banyak_air_minum" name="banyak_air_minum">

                <span class="text-danger" id="banyak_air_minumError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonSumberairminum">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonSumberairminum" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>