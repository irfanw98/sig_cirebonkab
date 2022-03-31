<form action="" method="post" autocomplete="off" class="formEditUnggas">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $unggas->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($unggas->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $unggas->tahun }}">

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
                    <option value="Ayam Kampung / Native Chicken" @if($unggas->jenis_unggas == 'Ayam Kampung / Native Chicken') selected @endif>Ayam Kampung / Native Chicken</option>
                    <option value="Ayam Pedaging / Broiler" @if($unggas->jenis_unggas == 'Ayam Pedaging / Broiler') selected @endif>Ayam Pedaging / Broiler</option>
                    <option value="Ayam Petelur / Layer" @if($unggas->jenis_unggas == 'Ayam Petelur / Layer') selected @endif>Ayam Petelur / Layer</option>
                    <option value="Itik / Duck" @if($unggas->jenis_unggas == 'Itik / Duck') selected @endif>Itik / Duck</option>
                    <option value="Itik Manila / Muscovy Duck" @if($unggas->jenis_unggas == 'Itik Manila / Muscovy Duck') selected @endif>Itik Manila / Muscovy Duck</option>
                    <option value="Merpati / Dove" @if($unggas->jenis_unggas == 'Merpati / Dove') selected @endif>Merpati / Dove</option>
                    <option value="Puyuh / Quail" @if($unggas->jenis_unggas == 'Puyuh / Quail') selected @endif>Puyuh / Quail</option>
                </select>

                <span class="text-danger" id="jenis_unggasError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jumlah_populasi">Jumlah Populasi :</label>
                <input type="text" class="form-control" id="jumlah_populasi" name="jumlah_populasi" value="{{ $unggas->jumlah_populasi }}">

                <span class="text-danger" id="jumlah_populasiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonUnggas">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonUnggas" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>