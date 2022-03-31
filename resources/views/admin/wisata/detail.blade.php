<div class="row">
 <div class="col-lg-12">
  <table class="table table-bordered table-hover">
   <thead>
    <tr>
        <th>Foto</th>
        <td>
             <img src="{{ asset('storage/wisata') }}/{{ $wisata->foto }}" width="200px">
        </td>
    </tr>
    <tr>
        <th>Nama Wisata</th>
        <td>{{ $wisata->nama_wisata }}</td>
    </tr>
    <tr>
        <th>Kecamatan</th>
        <td>{{ $wisata->kecamatan->nama_kecamatan }}</td>
    </tr>
    <tr>
        <th>Desa</th>
        <td>{{ $wisata->desa->nama_desa }}</td>
    </tr>
    <tr>
        <th>Latitude</th>
        <td>{{ $wisata->latitude }}</td>
    </tr>
    <tr>
        <th>Longitude</th>
        <td>{{ $wisata->longitude }}</td>
    </tr>
   </thead>
  </table>
 </div>
</div>
<div class="row">
    <div class="col-lg-12 ">
        <div class="d-flex align-items-end flex-column bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>