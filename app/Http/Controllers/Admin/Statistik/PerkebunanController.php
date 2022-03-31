<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Statistik\Perkebunan;
use App\Http\Requests\Statistik\Perkebunan\{
    StoreRequest,
    UpdateRequest
};

class PerkebunanController extends Controller
{

    public function index(Request $request)
    {
        $perkebunan = Perkebunan::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->orderBy('jenis_tanaman', 'ASC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($perkebunan)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success perkebunanEdit" role="button" idPerkebunanEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger perkebunanHapus" role="button" idPerkebunanHapus="' . $data->id . '" tahunPerkebunan="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisTanaman="' . $data->jenis_tanaman . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.perkebunan.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan')->get();

        return view('admin.statistik.perkebunan.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Perkebunan::create($request->validated());

        return redirect('/statistik-menu/pertanian/perkebunan');
    }

    public function edit($id)
    {
        $perkebunan = Perkebunan::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.perkebunan.edit', compact('perkebunan', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Perkebunan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/perkebunan');
    }

    public function destroy($id)
    {
        Perkebunan::destroy($id);

        return redirect('/statistik-menu/pertanian/perkebunan');
    }
}
