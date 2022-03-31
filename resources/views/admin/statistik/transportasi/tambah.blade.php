<form action="" method="post" autocomplete="off" class="formInsertTransportasi">
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_transportasi" id="id_transportasi">

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
                <label for="jenis_permukaan_jalan">Jenis Permukaan Jalan :</label>
                <input type="text" class="form-control" id="jenis_permukaan_jalan" name="jenis_permukaan_jalan">

                <span class="text-danger" id="jenis_permukaan_jalanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="akses_kendaraan">Dapat Dilalui Kendaraan :</label>
                <input type="text" class="form-control" id="akses_kendaraan" name="akses_kendaraan">

                <span class="text-danger" id="akses_kendaraanError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jenis_transportasi">Jenis Transportasi :</label>
                <input type="text" class="form-control" id="jenis_transportasi" name="jenis_transportasi">

                <span class="text-danger" id="jenis_transportasiError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="angkutan_umum">Keberadaan Angkutan Umum :</label>
                <input type="text" class="form-control" id="angkutan_umum" name="angkutan_umum">

                <span class="text-danger" id="angkutan_umumError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="menara_telepon">Jumlah Menara Telepon :</label>
                <input type="text" class="form-control" id="menara_telepon" name="menara_telepon">

                <span class="text-danger" id="menara_teleponError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="operator_layanan">Jumlah Operator Layanan :</label>
                <input type="text" class="form-control" id="operator_layanan" name="operator_layanan">

                <span class="text-danger" id="operator_layananError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sinyal_telepon">Kondisi Sinyal Telepon :</label>
                <input type="text" class="form-control" id="sinyal_telepon" name="sinyal_telepon">

                <span class="text-danger" id="sinyal_teleponError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="kantor_pos">Kantor Pos :</label>
                <input type="text" class="form-control" id="kantor_pos" name="kantor_pos">

                <span class="text-danger" id="kantor_posError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="perusahaan">Perusahaan :</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan">

                <span class="text-danger" id="perusahaanError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonTransportasi">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonTransportasi" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>