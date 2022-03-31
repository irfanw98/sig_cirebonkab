<form action="" method="post" autocomplete="off" class="formInsertPemerintahan">
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_pemerintahan" id="id_pemerintahan">

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
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="kantor_desa">Kantor Desa :</label>
                <input type="text" class="form-control" id="kantor_desa" name="kantor_desa">

                <span class="text-danger" id="kantor_desaError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kepala_desa">Kepala Desa :</label>
                <input type="text" class="form-control" id="kepala_desa" name="kepala_desa">

                <span class="text-danger" id="kepala_desaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sekretaris_desa">Sekretaris Desa :</label>
                <input type="text" class="form-control" id="sekretaris_desa" name="sekretaris_desa">

                <span class="text-danger" id="sekretaris_desaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="kepala_urusan">Kepala Urusan (KAUR) :</label>
                <input type="text" class="form-control" id="kepala_urusan" name="kepala_urusan">

                <span class="text-danger" id="kepala_urusanError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kepala_dusun">Kepala Dusun :</label>
                <input type="text" class="form-control" id="kepala_dusun" name="kepala_dusun">

                <span class="text-danger" id="kepala_dusunError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="hansip">Hansip :</label>
                <input type="text" class="form-control" id="hansip" name="hansip">

                <span class="text-danger" id="hansipError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pos_kamling">Pos Kamling :</label>
                <input type="text" class="form-control" id="pos_kamling" name="pos_kamling">

                <span class="text-danger" id="pos_kamlingError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="dusun">Dusun :</label>
                <input type="text" class="form-control" id="dusun" name="dusun">

                <span class="text-danger" id="dusunError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="rukun_warga">Rukun Warga (RW) :</label>
                <input type="text" class="form-control" id="rukun_warga" name="rukun_warga">

                <span class="text-danger" id="rukun_wargaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="rukun_tetangga">Rukun Tetangga :</label>
                <input type="text" class="form-control" id="rukun_tetangga" name="rukun_tetangga">

                <span class="text-danger" id="rukun_tetanggaError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h6><b>BPD</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="ketua_bpd">Ketua :</label>
                <input type="text" class="form-control" id="ketua_bpd" name="ketua_bpd">

                <span class="text-danger" id="ketua_bpdError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="wakil_bpd">Wakil :</label>
                <input type="text" class="form-control" id="wakil_bpd" name="wakil_bpd">

                <span class="text-danger" id="wakil_bpdError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sekretaris_bpd">Sekretaris :</label>
                <input type="text" class="form-control" id="sekretaris_bpd" name="sekretaris_bpd">

                <span class="text-danger" id="sekretaris_bpdError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="bendahara_bpd">Bendahara :</label>
                <input type="text" class="form-control" id="bendahara_bpd" name="bendahara_bpd">

                <span class="text-danger" id="bendahara_bpdError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="anggota_bpd">Anggota :</label>
                <input type="text" class="form-control" id="anggota_bpd" name="anggota_bpd">

                <span class="text-danger" id="anggota_bpdError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h6><b>LPMD</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="ketua_lpmd">Ketua :</label>
                <input type="text" class="form-control" id="ketua_lpmd" name="ketua_lpmd">

                <span class="text-danger" id="ketua_lpmdError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="wakil_lpmd">Wakil :</label>
                <input type="text" class="form-control" id="wakil_lpmd" name="wakil_lpmd">

                <span class="text-danger" id="wakil_lpmdError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sekretaris_lpmd">Sekretaris :</label>
                <input type="text" class="form-control" id="sekretaris_lpmd" name="sekretaris_lpmd">

                <span class="text-danger" id="sekretaris_lpmdError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="bendahara_lpmd">Bendahara :</label>
                <input type="text" class="form-control" id="bendahara_lpmd" name="bendahara_lpmd">

                <span class="text-danger" id="bendahara_lpmdError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="anggota_lpmd">Anggota :</label>
                <input type="text" class="form-control" id="anggota_lpmd" name="anggota_lpmd">

                <span class="text-danger" id="anggota_lpmdError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary saveButtonPemerintahan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonPemerintahan" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>