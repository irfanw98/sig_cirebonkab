<form action="" method="post" autocomplete="off" class="formEditTernak">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $ternak->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($ternak->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $ternak->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jenis_ternak">Jenis ternak :</label>
                <select class="select2multiple form-control" name="jenis_ternak" id="jenis_ternak">
                    <option value="">-- Pilih Jenis Ternak --</option>
                    <option value="Sapi Perah / Dairy Cattle" @if($ternak->jenis_ternak == 'Sapi Perah / Dairy Cattle') selected @endif>Sapi Perah / Dairy Cattle</option>
                    <option value="Sapi Potong / Beef Cattle" @if($ternak->jenis_ternak == 'Sapi Potong / Beef Cattle') selected @endif>Sapi Potong / Beef Cattle</option>
                    <option value="Kerbau / Buffalo" @if($ternak->jenis_ternak == 'Kerbau / Buffalo') selected @endif>Kerbau / Buffalo</option>
                    <option value="Kuda / Horse" @if($ternak->jenis_ternak == 'Kuda / Horse') selected @endif>Kuda / Horse</option>
                    <option value="Kambing / Goat" @if($ternak->jenis_ternak == 'Kambing / Goat') selected @endif>Kambing / Goat</option>
                    <option value="Domba / Sheep" @if($ternak->jenis_ternak == 'Domba / Sheep') selected @endif>Domba / Sheep</option>
                </select>

                <span class="text-danger" id="jenis_ternakError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jumlah_populasi">Jumlah Populasi :</label>
                <input type="text" class="form-control" id="jumlah_populasi" name="jumlah_populasi" value="{{ $ternak->jumlah_populasi }}">

                <span class="text-danger" id="jumlah_populasiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonTernak">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonTernak" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>