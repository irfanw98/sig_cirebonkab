<form action="" method="post" autocomplete="off" class="formEditNelayan">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $nelayan->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($nelayan->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $nelayan->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jenis_nelayan">Jenis nelayan :</label>
                <select class="select2multiple form-control" name="jenis_nelayan" id="jenis_nelayan">
                    <option value="">-- Pilih Jenis Nelayan --</option>
                    <option value="Nelayan Penuh / Full Time" @if($nelayan->jenis_nelayan == 'Nelayan Penuh / Full Time') selected @endif>Nelayan Penuh / Full Time</option>
                    <option value="Nelayan Sambilan Utama / Part Time" @if($nelayan->jenis_nelayan == 'Nelayan Sambilan Utama / Part Time') selected @endif>Nelayan Sambilan Utama / Part Time</option>
                </select>

                <span class="text-danger" id="jenis_nelayanError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jumlah_nelayan">Jumlah Nelayan :</label>
                <input type="text" class="form-control" id="jumlah_nelayan" name="jumlah_nelayan" value="{{ $nelayan->jumlah_nelayan }}">

                <span class="text-danger" id="jumlah_nelayanError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonNelayan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonNelayan" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>