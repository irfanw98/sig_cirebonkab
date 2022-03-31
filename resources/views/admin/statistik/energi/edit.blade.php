<form action="" method="post" autocomplete="off" class="formEditEnergi">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_energi" id="id_energi" value="{{ $energi->id_energi }}">

            <div class="form-group">
                <label for="id_desa">Desa :</label>
                <select class="select2multiple form-control" name="id_desa" id="id_desa">
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                    <option value="{{ $desa->id_desa }}" @if($energi->desa->id_desa == $desa->id_desa) selected @endif>{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="id_desaError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $energi->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h6><b>Pengguna Listrik</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="pln">PLN :</label>
                <input type="text" class="form-control" id="pln" name="pln" value="{{ $energi->pln }}">

                <span class="text-danger" id="plnError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="non_pln">Non PLN :</label>
                <input type="text" class="form-control" id="non_pln" name="non_pln" value="{{ $energi->non_pln }}">

                <span class="text-danger" id="non_plnError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pln_jumlah">Jumlah :</label>
                <input type="text" class="form-control" id="pln_jumlah" name="pln_jumlah" value="{{ $energi->pln_jumlah }}">

                <span class="text-danger" id="pln_jumlahError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="non_listrik">Bukan Pengguna Listrik:</label>
                <input type="text" class="form-control" id="non_listrik" name="non_listrik" value="{{ $energi->non_listrik }}">

                <span class="text-danger" id="non_listrikError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonEnergi">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonEnergi" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>