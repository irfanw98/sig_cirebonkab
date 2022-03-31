<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\{
    Kecamatan,
    Desa,
    Wisata
};
use App\Http\Requests\Wisata\{
    StoreRequest,
    UpdateRequest
};

class WisataController extends Controller
{

    public function index(Request $request)
    {
        $wisata = Wisata::with('kecamatan', 'desa')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('id_desa', 'ASC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($wisata)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-info wisataDetail" role="button" idWisataDetail="' . $data->id . '"><i class="fas fa-eye"></i> Detail</a>
                    <a href="" class="btn btn-success wisataEdit" role="button" idWisataEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger wisataHapus" role="button" idWisataHapus="' . $data->id . '" namaWisata="' . $data->nama_wisata . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.wisata.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.wisata.tambah', compact('kecamatans', 'desas'));
    }

    public function store(StoreRequest $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameSave = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/wisata', $filenameSave);
            $file->foto = $filenameSave;
        } else {
            $filenameSave = '';
        }

        $wisata = new Wisata;
        $wisata->id_desa = $request->id_desa;
        $wisata->kode_kecamatan = $request->kode_kecamatan;
        $wisata->nama_wisata = $request->nama_wisata;
        $wisata->foto = $filenameSave;
        $wisata->latitude = $request->latitude;
        $wisata->longitude = $request->longitude;
        $wisata->save();

        return redirect('/wisata-menu');
    }

    public function show($id)
    {
        $wisata = Wisata::with('kecamatan', 'desa')->findOrFail($id);

        return view('admin.wisata.detail', compact('wisata'));
    }

    public function edit($id)
    {
        $wisata = Wisata::with('kecamatan', 'desa')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.wisata.edit', compact('wisata', 'kecamatans', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameEdit = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/wisata', $filenameEdit);
            $oldFilename = $wisata->foto;
            $wisata->foto = $filenameEdit;
            Storage::disk('public')->delete("wisata/" . $oldFilename);
        } else {
            $filenameEdit = $wisata->foto;
        }

        $wisata->id_desa = $request->id_desa;
        $wisata->kode_kecamatan = $request->kode_kecamatan;
        $wisata->nama_wisata = $request->nama_wisata;
        $wisata->foto = $filenameEdit;
        $wisata->latitude = $request->latitude;
        $wisata->longitude = $request->longitude;
        $wisata->save();

        return redirect('/wisata-menu');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        Storage::disk('public')->delete("wisata/" . $wisata->foto);
        $wisata->delete();

        return redirect('/wisata-menu');
    }
}
