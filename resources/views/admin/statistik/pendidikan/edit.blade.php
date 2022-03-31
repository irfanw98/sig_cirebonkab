<form action="" method="post" autocomplete="off" class="formEditPendidikan">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-6">

            <input type="hidden" name="id" id="id" value="{{ $pendidikan->id }}">

            <div class="form-group">
                <label for="kode_kecamatan">Kecamatan :</label>
                <select class="select2multiple form-control" name="kode_kecamatan" id="kode_kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_kecamatan }}" @if($pendidikan->kecamatan->kode_kecamatan == $kecamatan->kode_kecamatan) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>

                <span class="text-danger" id="kode_kecamatanError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun">Tahun :</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $pendidikan->tahun }}">

                <span class="text-danger" id="tahunError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah :</label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="{{ $pendidikan->nama_sekolah }}">

                <span class="text-danger" id="nama_sekolahError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                <label for="jenjang">Jenjang :</label>
                <input type="text" class="form-control" id="jenjang" name="jenjang" value="{{ $pendidikan->jenjang }}">

                <span class="text-danger" id="jenjangError"></span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="jumlah_murid">Jumlah Murid :</label>
                <input type="text" class="form-control" id="jumlah_murid" name="jumlah_murid" value="{{ $pendidikan->jumlah_murid }}">

                <span class="text-danger" id="jumlah_muridError"></span>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="jumlah_guru">Jumlah Guru :</label>
                <input type="text" class="form-control" id="jumlah_guru" name="jumlah_guru" value="{{ $pendidikan->jumlah_guru }}">

                <span class="text-danger" id="jumlah_guruError"></span>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <label for="rasio_murid_guru">Rasio Murid-Guru :</label>
                <input type="text" class="form-control" id="rasio_murid_guru" name="rasio_murid_guru" value="{{ $pendidikan->rasio_murid_guru }}">

                <span class="text-danger" id="rasio_murid_guruError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonPendidikan">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonPendidikan" data-dismiss="modal">Batal</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2multiple').select2();
    })
</script>