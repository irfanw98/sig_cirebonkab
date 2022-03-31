<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\{
    Desa,
    Kecamatan
};
use App\Http\Requests\Desa\{
    StoreRequest,
    UpdateRequest
};

class DesaController extends Controller
{
    public function index(Request $request)
    {

        $desas = Desa::with('kecamatan')->orderBy('kode_desa', 'ASC')->get();

        if ($request->ajax()) {
            return DataTables::of($desas)
                ->addColumn('nama_kecamatan', function($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-info desaDetail" role="button" idDesaDetail="' . $data->id_desa . '"><i class="fas fa-eye"></i> Detail</a>
                    <a href="" class="btn btn-success desaEdit" role="button" idDesaEdit="' . $data->id_desa . '"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger desaHapus" role="button" idDesaHapus="' . $data->id_desa . '" namaDesa="' . $data->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_desa')
                ->make(true);
        }

        return view('admin.desa.index', compact('desas'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.desa.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameSave = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/desa', $filenameSave);
            $file->foto = $filenameSave;
        } else {
            $filenameSave = '';
        }

        $desa = new Desa;
        $desa->id_desa = $request->kode_kecamatan . $request->kode_desa;
        $desa->kode_kecamatan = $request->kode_kecamatan;
        $desa->kode_desa = $request->kode_desa;
        $desa->nama_desa = $request->nama_desa;
        $desa->foto = $filenameSave;
        $desa->geojson = $request->geojson;
        $desa->warna_wilayah_desa = $request->warna_wilayah_desa;
        $desa->latitude = $request->latitude;
        $desa->longitude = $request->longitude;
        $desa->deskripsi = $request->deskripsi;
        $desa->save();

        return redirect('/desa-menu');
    }

    public function show($id)
    {
        $desa = Desa::with('kecamatan')->findOrFail($id);

        return view('admin.desa.detail', compact('desa'));
    }

    public function edit($id)
    {
        $desa = Desa::with('kecamatan')->findOrFail($id);

        return view('admin.desa.edit', compact('desa'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $desa = Desa::findOrFail($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameEdit = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/desa', $filenameEdit);
            $oldFilename = $desa->foto;
            $desa->foto = $filenameEdit;
            Storage::disk('public')->delete("desa/" . $oldFilename);
        } else {
            $filenameEdit = $desa->foto;
        }

        $desa->id_desa = $request->kode_kecamatan . $request->kode_desa;
        $desa->kode_kecamatan = $request->kode_kecamatan;
        $desa->kode_desa = $request->kode_desa;
        $desa->nama_desa = $request->nama_desa;
        $desa->foto = $filenameEdit;
        $desa->geojson = $request->geojson;
        $desa->warna_wilayah_desa = $request->warna_wilayah_desa;
        $desa->latitude = $request->latitude;
        $desa->longitude = $request->longitude;
        $desa->deskripsi = $request->deskripsi;
        $desa->save();

        return redirect('/desa-menu');
    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        Storage::disk('public')->delete("desa/" . $desa->foto);
        $desa->delete();

        return redirect('/desa-menu');
    }
}
