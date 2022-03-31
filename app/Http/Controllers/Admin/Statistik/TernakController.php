<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Ternak;
use App\Http\Requests\Statistik\Ternak\{
    StoreRequest,
    UpdateRequest
};

class TernakController extends Controller
{
    public function index(Request $request)
    {
        $ternak = Ternak::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($ternak)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success ternakEdit" role="button" idTernakEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger ternakHapus" role="button" idTernakHapus="' . $data->id . '" tahunTernak="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisTernak="' . $data->jenis_ternak . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.ternak.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.ternak.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Ternak::create($request->validated());

        return redirect('/statistik-menu/pertanian/ternak');
    }

    public function edit($id)
    {
        $ternak = Ternak::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.ternak.edit', compact('ternak', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Ternak::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/ternak');
    }

    public function destroy($id)
    {
        Ternak::destroy($id);

        return redirect('/statistik-menu/pertanian/ternak');
    }
}
