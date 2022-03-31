<div class="row">
 <div class="col-lg-12">
  <table class="table table-bordered table-hover">
   <thead>
    <tr>
        <th>ID Desa</th>
        <td>{{ $desa->id_desa }}</td>
    </tr>
    <tr>
        <th>Kode Desa</th>
        <td>{{ $desa->kode_desa }}</td>
    </tr>
    <tr>
        <th>Nama Desa</th>
        <td>{{ $desa->nama_desa }}</td>
    </tr>
    <tr>
        <th>Kecamatan</th>
        <td>{{ $desa->kecamatan->nama_kecamatan }}</td>
    </tr>
    <tr>
        <th>Foto</th>
        <td>
             <img src="{{ asset('storage/desa') }}/{{ $desa->foto }}" width="200px">
        </td>
    </tr>
    <tr>
        <th>Warna Wilayah Desa</th>
        <td style="background-color: {{ $desa->warna_wilayah_desa }}"></td>
    </tr>
    <tr>
        <th>Latitude</th>
        <td>{{ $desa->latitude }}</td>
    </tr>
    <tr>
        <th>Longitude</th>
        <td>{{ $desa->longitude }}</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>{!! $desa->deskripsi !!}</td>
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