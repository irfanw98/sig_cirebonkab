<form action="" method="post" autocomplete="off" class="formEditPerdagangan">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_perdagangan" id="id_perdagangan" value="{{ $perdagangan->id_perdagangan }}">

            <div class="form-group">
                <label for="id_desa">Desa :</label>
                <select class="select2multiple form-control" name="id_desa" id="id_desa">
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                    <option value="{{ $desa->id_desa }}" @if($perdagangan->desa->id_desa == $desa->id_desa) selected @endif>{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="id_desaError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $perdagangan->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kelompok_pertokoan">Kelompok Pertokoan :</label>
                <input type="text" class="form-control" id="kelompok_pertokoan" name="kelompok_pertokoan" value="{{ $perdagangan->kelompok_pertokoan }}">

                <span class="text-danger" id="kelompok_pertokoanError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pasar_bangunan_permanen">Pasar Bangunan Permanen :</label>
                <input type="text" class="form-control" id="pasar_bangunan_permanen" name="pasar_bangunan_permanen" value="{{ $perdagangan->pasar_bangunan_permanen }}">

                <span class="text-danger" id="pasar_bangunan_permanenError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pasar_tanpa_bangunan">Pasar Tanpa Bangunan :</label>
                <input type="text" class="form-control" id="pasar_tanpa_bangunan" name="pasar_tanpa_bangunan" value="{{ $perdagangan->pasar_tanpa_bangunan }}">

                <span class="text-danger" id="pasar_tanpa_bangunanError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pasar_bangunan_semipermanen">Pasar Bangunan Semi Permanen :</label>
                <input type="text" class="form-control" id="pasar_bangunan_semipermanen" name="pasar_bangunan_semipermanen" value="{{ $perdagangan->pasar_bangunan_semipermanen }}">

                <span class="text-danger" id="pasar_bangunan_semipermanenError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="minimarket">Minimarket/Swalayan<sup>1</sup> :</label>
                <input type="text" class="form-control" id="minimarket" name="minimarket" value="{{ $perdagangan->minimarket }}">

                <span class="text-danger" id="minimarketError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="toko">Toko/Warung Kelontong :</label>
                <input type="text" class="form-control" id="toko" name="toko" value="{{ $perdagangan->toko }}">

                <span class="text-danger" id="tokoError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="restoran">Restoran/Rumah Makan :</label>
                <input type="text" class="form-control" id="restoran" name="restoran" value="{{ $perdagangan->restoran }}">

                <span class="text-danger" id="restoranError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="warung">Warung/Kedai Makanan :</label>
                <input type="text" class="form-control" id="warung" name="warung" value="{{ $perdagangan->warung }}">

                <span class="text-danger" id="warungError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="hotel">Hotel :</label>
                <input type="text" class="form-control" id="hotel" name="hotel" value="{{ $perdagangan->hotel }}">

                <span class="text-danger" id="hotelError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="motel">Hostel/Motel/Losmen/Wisma :</label>
                <input type="text" class="form-control" id="motel" name="motel" value="{{ $perdagangan->motel }}">

                <span class="text-danger" id="motelError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonPerdagangan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonPerdagangan" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>