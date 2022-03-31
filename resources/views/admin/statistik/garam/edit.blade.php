<form action="" method="post" autocomplete="off" class="formEditGaram">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $garam->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($garam->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $garam->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-6">
           <div class="form-group">
                <label for="uraian">Uraian :</label>
                <select class="select2multiple form-control" name="uraian" id="uraian">
                    <option value="">-- Pilih Uraian --</option>
                    <option value="Petambak (Orang) / Salt Farmers (People)" @if($garam->uraian == 'Petambak (Orang) / Salt Farmers (People)') selected @endif>Petambak (Orang) / Salt Farmers (People)</option>
                    <option value="Luas Lahan (ha) / Land Area (ha)" @if($garam->uraian == 'Luas Lahan (ha) / Land Area (ha)') selected @endif>Luas Lahan (ha) / Land Area (ha)</option>
                    <option value="Produksi (ton) / Production (ton)" @if($garam->uraian == 'Produksi (ton) / Production (ton)') selected @endif>Produksi (ton) / Production (ton)</option>
                </select>

                <span class="text-danger" id="uraianError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="jumlah">Jumlah :</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $garam->jumlah }}">

                <span class="text-danger" id="jumlahError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonGaram">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonGaram" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>