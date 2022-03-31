<form action="" method="post" autocomplete="off" class="formEditSosial">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id_sosial" id="id_sosial" value="{{ $sosial->id_sosial }}">

            <div class="form-group">
                <label for="id_desa">Desa :</label>
                <select class="select2multiple form-control" name="id_desa" id="id_desa">
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                    <option value="{{ $desa->id_desa }}" @if($sosial->desa->id_desa == $desa->id_desa) selected @endif>{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="id_desaError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $sosial->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Sekolah Dasar (SD)</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="sd_negeri">SD Negeri :</label>
                <input type="text" class="form-control" id="sd_negeri" name="sd_negeri" value="{{ $sosial->sd_negeri }}">

                <span class="text-danger" id="sd_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sd_swasta">SD Swasta :</label>
                <input type="text" class="form-control" id="sd_swasta" name="sd_swasta" value="{{ $sosial->sd_swasta }}">

                <span class="text-danger" id="sd_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sd_jumlah">SD Jumlah :</label>
                <input type="text" class="form-control" id="sd_jumlah" name="sd_jumlah" value="{{ $sosial->sd_jumlah }}">

                <span class="text-danger" id="sd_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Madrasah Ibtidaiyah (MI)</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="mi_negeri">MI Negeri :</label>
                <input type="text" class="form-control" id="mi_negeri" name="mi_negeri" value="{{ $sosial->mi_negeri }}">

                <span class="text-danger" id="mi_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="mi_swasta">MI Swasta :</label>
                <input type="text" class="form-control" id="mi_swasta" name="mi_swasta" value="{{ $sosial->mi_swasta }}">

                <span class="text-danger" id="mi_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="mi_jumlah">MI Jumlah :</label>
                <input type="text" class="form-control" id="mi_jumlah" name="mi_jumlah" value="{{ $sosial->mi_jumlah }}">

                <span class="text-danger" id="mi_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Sekolah Menengah Pertama (SMP)</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="smp_negeri">SMP Negeri :</label>
                <input type="text" class="form-control" id="smp_negeri" name="smp_negeri" value="{{ $sosial->smp_negeri }}">

                <span class="text-danger" id="smp_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="smp_swasta">SMP Swasta :</label>
                <input type="text" class="form-control" id="smp_swasta" name="smp_swasta" value="{{ $sosial->smp_swasta }}">

                <span class="text-danger" id="smp_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="smp_jumlah">SMP Jumlah :</label>
                <input type="text" class="form-control" id="smp_jumlah" name="smp_jumlah" value="{{ $sosial->smp_jumlah }}">

                <span class="text-danger" id="smp_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Madrasah Tsanawiyah (MTS)</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="mts_negeri">MTS Negeri :</label>
                <input type="text" class="form-control" id="mts_negeri" name="mts_negeri" value="{{ $sosial->mts_negeri }}">

                <span class="text-danger" id="mts_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="mts_swasta">MTS Swasta :</label>
                <input type="text" class="form-control" id="mts_swasta" name="mts_swasta" value="{{ $sosial->mts_swasta }}">

                <span class="text-danger" id="mts_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="mts_jumlah">MTS Jumlah :</label>
                <input type="text" class="form-control" id="mts_jumlah" name="mts_jumlah" value="{{ $sosial->mts_jumlah }}">

                <span class="text-danger" id="mts_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Sekolah Menengah Atas (SMA)</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="sma_negeri">SMA Negeri :</label>
                <input type="text" class="form-control" id="sma_negeri" name="sma_negeri" value="{{ $sosial->sma_negeri }}">

                <span class="text-danger" id="sma_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sma_swasta">SMA Swasta :</label>
                <input type="text" class="form-control" id="sma_swasta" name="sma_swasta" value="{{ $sosial->sma_swasta }}">

                <span class="text-danger" id="sma_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sma_jumlah">SMA Jumlah :</label>
                <input type="text" class="form-control" id="sma_jumlah" name="sma_jumlah" value="{{ $sosial->sma_jumlah }}">

                <span class=" text-danger" id="sma_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Madrasah Aliyah (MA)</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="ma_negeri">MA Negeri :</label>
                <input type="text" class="form-control" id="ma_negeri" name="ma_negeri" value="{{ $sosial->ma_negeri }}">

                <span class=" text-danger" id="ma_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="ma_swasta">MA Swasta :</label>
                <input type="text" class="form-control" id="ma_swasta" name="ma_swasta" value="{{ $sosial->ma_swasta }}">

                <span class="text-danger" id="ma_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="ma_jumlah">MA Jumlah :</label>
                <input type="text" class="form-control" id="ma_jumlah" name="ma_jumlah" value="{{ $sosial->ma_jumlah }}">

                <span class="text-danger" id="ma_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Sekolah Menengah Kejuruan (SMK)</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="smk_negeri">SMK Negeri :</label>
                <input type="text" class="form-control" id="smk_negeri" name="smk_negeri" value="{{ $sosial->smk_negeri}}">

                <span class="text-danger" id="smk_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="smk_swasta">SMK Swasta :</label>
                <input type="text" class="form-control" id="smk_swasta" name="smk_swasta" value="{{ $sosial->smk_swasta }}">

                <span class="text-danger" id="smk_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="smk_jumlah">SMK Jumlah :</label>
                <input type="text" class="form-control" id="smk_jumlah" name="smk_jumlah" value="{{ $sosial->smk_jumlah }}">

                <span class="text-danger" id="smk_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Perguruan Tinggi</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="pt_negeri">PT Negeri :</label>
                <input type="text" class="form-control" id="pt_negeri" name="pt_negeri" value="{{ $sosial->pt_negeri }}">

                <span class="text-danger" id="pt_negeriError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pt_swasta">PT Swasta :</label>
                <input type="text" class="form-control" id="pt_swasta" name="pt_swasta" value="{{ $sosial->pt_swasta }}">

                <span class="text-danger" id="pt_swastaError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pt_jumlah">PT Jumlah :</label>
                <input type="text" class="form-control" id="pt_jumlah" name="pt_jumlah" value="{{ $sosial->pt_jumlah }}">

                <span class="text-danger" id="pt_jumlahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Sarana Pendidikan Terdekat</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_sd">SD :</label>
                <input type="text" class="form-control" id="sarana_sd" name="sarana_sd" value="{{ $sosial->sarana_sd }}">

                <span class="text-danger" id="sarana_sdError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_mi">MI :</label>
                <input type="text" class="form-control" id="sarana_mi" name="sarana_mi" value="{{ $sosial->sarana_mi }}">

                <span class="text-danger" id="sarana_miError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_smp">SMP :</label>
                <input type="text" class="form-control" id="sarana_smp" name="sarana_smp" value="{{ $sosial->sarana_smp }}">

                <span class="text-danger" id="sarana_smpError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_mts">MTS :</label>
                <input type="text" class="form-control" id="sarana_mts" name="sarana_mts" value="{{ $sosial->sarana_mts }}">

                <span class="text-danger" id="sarana_mtsError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_sma">SMA :</label>
                <input type="text" class="form-control" id="sarana_sma" name="sarana_sma" value="{{ $sosial->sarana_sma }}">

                <span class="text-danger" id="sarana_smaError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_ma">MA :</label>
                <input type="text" class="form-control" id="sarana_ma" name="sarana_ma" value="{{ $sosial->sarana_ma }}">

                <span class="text-danger" id="sarana_maError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_smk">SMK :</label>
                <input type="text" class="form-control" id="sarana_smk" name="sarana_smk" value="{{ $sosial->sarana_smk }}">

                <span class="text-danger" id="sarana_smkError"></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="sarana_pt">Peguruan Tinggi :</label>
                <input type="text" class="form-control" id="sarana_pt" name="sarana_pt" value="{{ $sosial->sarana_pt }}">

                <span class="text-danger" id="sarana_ptError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Banyak Sarana Kesahatan</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="sarana_rs">Rumah Sakit :</label>
                <input type="text" class="form-control" id="sarana_rs" name="sarana_rs" value="{{ $sosial->sarana_rs }}">

                <span class="text-danger" id="sarana_rsError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sarana_rs_bersalin">Rumah Sakit Bersalin :</label>
                <input type="text" class="form-control" id="sarana_rs_bersalin" name="sarana_rs_bersalin" value="{{ $sosial->sarana_rs_bersalin }}">

                <span class="text-danger" id="sarana_rs_bersalinError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sarana_poliklinik">Poliklinik :</label>
                <input type="text" class="form-control" id="sarana_poliklinik" name="sarana_poliklinik" value="{{ $sosial->sarana_poliklinik }}">

                <span class="text-danger" id="sarana_poliklinikError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="sarana_rawat_inap">Rawat Inap :</label>
                <input type="text" class="form-control" id="sarana_rawat_inap" name="sarana_rawat_inap" value="{{ $sosial->sarana_rawat_inap }}">

                <span class="text-danger" id="sarana_rawat_inapError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sarana_tanpa_rawat_inap">Tanpa Rawat Inap :</label>
                <input type="text" class="form-control" id="sarana_tanpa_rawat_inap" name="sarana_tanpa_rawat_inap" value="{{ $sosial->sarana_tanpa_rawat_inap }}">

                <span class="text-danger" id="sarana_tanpa_rawat_inapError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sarana_apotek">Apotek :</label>
                <input type="text" class="form-control" id="sarana_apotek" name="sarana_apotek" value="{{ $sosial->sarana_apotek }}">

                <span class="text-danger" id="sarana_apotekError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <h6><b>Sarana Kesahatan Terdekat</b></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kemudahan_rs">Rumah Sakit :</label>
                <input type="text" class="form-control" id="kemudahan_rs" name="kemudahan_rs" value="{{ $sosial->kemudahan_rs }}">

                <span class="text-danger" id="kemudahan_rsError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="kemudahan_rs_bersalin">Rumah Sakit Bersalin :</label>
                <input type="text" class="form-control" id="kemudahan_rs_bersalin" name="kemudahan_rs_bersalin" value="{{ $sosial->kemudahan_rs_bersalin }}">

                <span class="text-danger" id="kemudahan_rs_bersalinError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="kemudahan_poliklinik">Poliklinik :</label>
                <input type="text" class="form-control" id="kemudahan_poliklinik" name="kemudahan_poliklinik" value="{{ $sosial->kemudahan_poliklinik }}">

                <span class="text-danger" id="kemudahan_poliklinikError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="kemudahan_rawat_inap">Rawat Inap :</label>
                <input type="text" class="form-control" id="kemudahan_rawat_inap" name="kemudahan_rawat_inap" value="{{ $sosial->kemudahan_rawat_inap }}">

                <span class="text-danger" id="kemudahan_rawat_inapError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="kemudahan_tanpa_rawat_inap">Tanpa Rawat Inap :</label>
                <input type="text" class="form-control" id="kemudahan_tanpa_rawat_inap" name="kemudahan_tanpa_rawat_inap" value="{{ $sosial->kemudahan_tanpa_rawat_inap }}">

                <span class="text-danger" id="kemudahan_tanpa_rawat_inapError"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="kemudahan_apotek">Apotek :</label>
                <input type="text" class="form-control" id="kemudahan_apotek" name="kemudahan_apotek" value="{{ $sosial->kemudahan_apotek }}">

                <span class="text-danger" id="kemudahan_apotekError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="gizi_buruk">Gizi Buruk :</label>
                <input type="text" class="form-control" id="gizi_buruk" name="gizi_buruk" value="{{ $sosial->gizi_buruk }}">

                <span class="text-danger" id="gizi_burukError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonSosial">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonSosial" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>