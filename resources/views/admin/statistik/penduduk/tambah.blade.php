<form action="" method="post" autocomplete="off" class="formInsertPenduduk">
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_penduduk" id="id_penduduk">

            <div class="form-group">
                <label for="id_desa">Desa :</label>
                <select class="select2multiple form-control" name="id_desa" id="id_desa">
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                    <option value="{{ $desa->id_desa }}">{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="id_desaError"></span>
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jumlah">Penduduk (Jiwa<sup>1</sup>) :</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah">

                <span class="text-danger" id="jumlahError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="laju">Laju Pertumbuhan Penduduk :</label>
                <input type="text" class="form-control" id="laju" name="laju">

                <span class="text-danger" id="lajuError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="persentase">Persentase Penduduk :</label>
                <input type="text" class="form-control" id="persentase" name="persentase">

                <span class="text-danger" id="persentaseError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kepadatan">Kepadatan Penduduk (per km<sup>2</sup>)<sup>4</sup> :</label>
                <input type="text" class="form-control" id="kepadatan" name="kepadatan">

                <span class="text-danger" id="kepadatanError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="rasio_jk">Rasio Jenis Kelamin :</label>
                <input type="text" class="form-control" id="rasio_jk" name="rasio_jk">

                <span class="text-danger" id="rasio_jkError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonPenduduk">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonPenduduk" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>