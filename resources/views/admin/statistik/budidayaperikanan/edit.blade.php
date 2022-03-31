<form action="" method="post" autocomplete="off" class="formEditBudidayaperikanan">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $budidayaperikanan->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($budidayaperikanan->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $budidayaperikanan->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jenis_budidaya">Jenis Budidaya :</label>
                <select class="select2multiple form-control" name="jenis_budidaya" id="jenis_budidaya">
                    <option value="">-- Pilih Jenis Budidaya --</option>
                    <option value="Budidaya Laut / Marine Culture" @if($budidayaperikanan->jenis_budidaya == 'Budidaya Laut / Marine Culture') selected @endif>Budidaya Laut / Marine Culture</option>
                    <option value="Tambak Brackish / Water Pond" @if($budidayaperikanan->jenis_budidaya == 'Tambak Brackish / Water Pond') selected @endif>Tambak Brackish / Water Pond</option>
                    <option value="Kolam Fresh / Water Pond" @if($budidayaperikanan->jenis_budidaya == 'Kolam Fresh / Water Pond') selected @endif>Kolam Fresh / Water Pond</option>
                </select>

                <span class="text-danger" id="jenis_budidayaError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jumlah_budidaya">Jumlah Budidaya :</label>
                <input type="text" class="form-control" id="jumlah_budidaya" name="jumlah_budidaya" value="{{ $budidayaperikanan->jumlah_budidaya }}">

                <span class="text-danger" id="jumlah_budidayaError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonBudidayaperikanan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonBudidayaperikanan" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>