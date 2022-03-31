<form action="" method="post" autocomplete="off" class="formEditKeuangan">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_keuangan" id="id_keuangan" value="{{ $keuangan->id_keuangan }}">

            <div class="form-group">
                <label for="id_desa">Desa :</label>
                <select class="select2multiple form-control" name="id_desa" id="id_desa">
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                    <option value="{{ $desa->id_desa }}" @if($keuangan->desa->id_desa == $desa->id_desa) selected @endif>{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="id_desaError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $keuangan->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="bank_umum_pemerintah">Bank Umum Pemerintah :</label>
                <input type="text" class="form-control" id="bank_umum_pemerintah" name="bank_umum_pemerintah" value="{{ $keuangan->bank_umum_pemerintah }}">

                <span class="text-danger" id="bank_umum_pemerintahError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bank_umum_swasta">Bank Umum Swasta :</label>
                <input type="text" class="form-control" id="bank_umum_swasta" name="bank_umum_swasta" value="{{ $keuangan->bank_umum_swasta }}">

                <span class="text-danger" id="bank_umum_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bank_perkreditan_rakyat">Bank Perkreditan Rakyat :</label>
                <input type="text" class="form-control" id="bank_perkreditan_rakyat" name="bank_perkreditan_rakyat" value="{{ $keuangan->bank_perkreditan_rakyat }}">

                <span class="text-danger" id="bank_perkreditan_rakyatError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="kud">KUD :</label>
                <input type="text" class="form-control" id="kud" name="kud" value="{{ $keuangan->kud }}">

                <span class="text-danger" id="kudError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="kopinkra">Kopinkra :</label>
                <input type="text" class="form-control" id="kopinkra" name="kopinkra" value="{{ $keuangan->kopinkra }}">

                <span class="text-danger" id="kopinkraError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="kospin">Kospin:</label>
                <input type="text" class="form-control" id="kospin" name="kospin" value="{{ $keuangan->kospin }}">

                <span class="text-danger" id="kospinError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="koperasi_lainnya">Koperasi Lainnya :</label>
                <input type="text" class="form-control" id="koperasi_lainnya" name="koperasi_lainnya" value="{{ $keuangan->koperasi_lainnya }}">

                <span class="text-danger" id="koperasi_lainnyaError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonKeuangan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonKeuangan" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>