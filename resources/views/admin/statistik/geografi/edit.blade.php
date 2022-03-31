<form action="" method="post" autocomplete="off" class="formEditGeografi">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_geografi" id="id_geografi" value="{{ $geografi->id_geografi }}">

            <div class="form-group">
                <label for="id_desa">Desa :</label>
                <select class="select2multiple form-control" name="id_desa" id="id_desa">
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                    <option value="{{ $desa->id_desa }}" @if($geografi->desa->id_desa == $desa->id_desa) selected @endif
                        >{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="id_desaError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $geografi->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="luas">Luas (Km<sup>2</sup>) :</label>
                <input type="text" class="form-control" id="luas" name="luas" value="{{ $geografi->luas }}">

                <span class="text-danger" id="luasError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="ketinggian">Ketinggian (m) :</label>
                <input type="text" class="form-control" id="ketinggian" name="ketinggian" value="{{ $geografi->ketinggian }}">

                <span class="text-danger" id="ketinggianError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jarak_kecamatan">Ibukota Kecamatan :</label>
                <input type="text" class="form-control" id="jarak_kecamatan" name="jarak_kecamatan" value="{{ $geografi->jarak_kecamatan }}">

                <span class="text-danger" id="jarak_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jarak_kabupaten">Ibukota Kabupaten :</label>
                <input type="text" class="form-control" id="jarak_kabupaten" name="jarak_kabupaten" value="{{ $geografi->jarak_kabupaten }}">

                <span class="text-danger" id="jarak_kabupatenError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonGeografi">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonGeografi" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>