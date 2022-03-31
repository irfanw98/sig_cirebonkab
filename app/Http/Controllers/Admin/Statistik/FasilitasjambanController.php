<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Fasilitasjamban;
use App\Http\Requests\Statistik\Fasilitasjamban\{
    StoreRequest,
    UpdateRequest
};

class FasilitasjambanController extends Controller
{

    public function index(Request $request)
    {
        $fasilitasjamban = Fasilitasjamban::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($fasilitasjamban)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success fasilitasjambanEdit" role="button" idFasilitasjambanEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger fasilitasjambanHapus" role="button" idFasilitasjambanHapus="' . $data->id . '" tahunFasilitasjamban="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" namafasilitasjamban="' . $data->nama_jamban . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.fasilitasjamban.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.fasilitasjamban.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Fasilitasjamban::create($request->validated());

        return redirect('/statistik-menu/sosial/fasilitas-jamban');
    }

    public function edit($id)
    {
        $fasilitasjamban = Fasilitasjamban::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.fasilitasjamban.edit', compact('fasilitasjamban', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Fasilitasjamban::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/sosial/fasilitas-jamban');
    }

    public function destroy($id)
    {
        Fasilitasjamban::destroy($id);

        return redirect('/statistik-menu/sosial/fasilitas-jamban');
    }
}
