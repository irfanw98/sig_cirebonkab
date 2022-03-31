<form action="" method="post" autocomplete="off" class="formEditTentangkami" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-12 text-center">
            <input type="hidden" name="id_tentang_kami" id="id_tentang_kami" value="{{ $tentangkami->id_tentang_kami }}">

            <div class="form-group">
                <img src="{{ asset('storage/tentangkami') }}/{{ $tentangkami->foto }}" width="300px"><br>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="form-group">
                <label for="foto">Upload Foto :</label>
                <input type="file" id="foto" name="foto">

                <span class="text-danger" id="fotoError"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $tentangkami->deskripsi }}">
                <trix-editor input="deskripsi"></trix-editor>

                <span class="text-danger" id="deskripsiError"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary editButtonTentangkami">Simpan</button>
        <button type="button" class="btn btn-outline-danger cancelButtonTentangkami" data-dismiss="modal">Batal</button>
    </div>
</form>