<form action="" method="post" autocomplete="off" class="formInsertFasilitasjamban">
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
                <label for="nama_jamban">Nama Jamban :</label>
                <input type="text" class="form-control" id="nama_jamban" name="nama_jamban">

                <span class="text-danger" id="nama_jambanError"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="banyak_jamban">Banyak Jamban :</label>
                <input type="text" class="form-control" id="banyak_jamban" name="banyak_jamban">

                <span class="text-danger" id="banyak_jambanError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonFasilitasjamban">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonFasilitasjamban" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>