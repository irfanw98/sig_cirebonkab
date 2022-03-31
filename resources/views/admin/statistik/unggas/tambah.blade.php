<form action="" method="post" autocomplete="off" class="formInsertUnggas">
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
                <label for="jenis_unggas">Jenis unggas :</label>
                <select class="select2multiple form-control" name="jenis_unggas" id="jenis_unggas">
                    <option value="">-- Pilih Jenis Unggas --</option>
                    <option value="Ayam Kampung / Native Chicken">Ayam Kampung / Native Chicken</option>
                    <option value="Ayam Pedaging / Broiler">Ayam Pedaging / Broiler</option>
                    <option value="Ayam Petelur / Layer">Ayam Petelur / Layer</option>
                    <option value="Itik / Duck">Itik / Duck</option>
                    <option value="Itik Manila / Muscovy Duck">Itik Manila / Muscovy Duck</option>
                    <option value="Merpati / Dove">Merpati / Dove</option>
                    <option value="Puyuh / Quail">Puyuh / Quail</option>
                </select>

                <span class="text-danger" id="jenis_unggasError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jumlah_populasi">Jumlah Populasi :</label>
                <input type="text" class="form-control" id="jumlah_populasi" name="jumlah_populasi">

                <span class="text-danger" id="jumlah_populasiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonUnggas">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonUnggas" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>