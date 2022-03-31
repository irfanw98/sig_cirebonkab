<form action="" method="post" autocomplete="off" class="formEditPadipalawija">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $padipalawija->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($padipalawija->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $padipalawija->tahun }}">

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
                    <option value="Jagung/Maize" @if($padipalawija->jenis_tanaman == 'Jagung/Maize') selected @endif>Jagung/Maize</option>
                    <option value="Kacang Hijau/Green Beans" @if($padipalawija->jenis_tanaman == 'Kacang Hijau/Green Beans') selected @endif>Kacang Hijau/Green Beans</option>
                    <option value="Kacang Tanah/Peanuts" @if($padipalawija->jenis_tanaman == 'Kacang Tanah/Peanuts') selected @endif>Kacang Tanah/Peanuts</option>
                    <option value="Kedelai/Soy" @if($padipalawija->jenis_tanaman == 'Kedelai/Soy') selected @endif>Kedelai/Soy</option>
                    <option value="Padi Sawah/Paddy Rice" @if($padipalawija->jenis_tanaman == 'Padi Sawah/Paddy Rice') selected @endif>Padi Sawah/Paddy Rice</option>
                    <option value="Ubi Jalar/Sweet Potato" @if($padipalawija->jenis_tanaman == 'Ubi Jalar/Sweet Potato') selected @endif>Ubi Jalar/Sweet Potato</option>
                    <option value="Ubi Kayu/Cassava" @if($padipalawija->jenis_tanaman == 'Ubi Kayu/Cassava') selected @endif>Ubi Kayu/Cassava</option>
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
                <input type="text" class="form-control" id="luas_tanam" name="luas_tanam" value="{{ $padipalawija->luas_tanam }}">

                <span class="text-danger" id="luas_tanamError"></span>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="luas_panen">Luas Penen (Ha):</label>
                <input type="text" class="form-control" id="luas_panen" name="luas_panen" value="{{ $padipalawija->luas_panen }}">

                <span class="text-danger" id="luas_panenError"></span>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="produksi">Produksi (Ton):</label>
                <input type="text" class="form-control" id="produksi" name="produksi" value="{{ $padipalawija->produksi }}">

                <span class="text-danger" id="produksiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonPadipalawija">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonPadipalawija" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>