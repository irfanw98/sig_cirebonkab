<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Garam;
use App\Http\Requests\Statistik\Garam\{
    StoreRequest,
    UpdateRequest
};

class GaramController extends Controller
{

    public function index(Request $request)
    {
        $garam = Garam::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($garam)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success garamEdit" role="button" idGaramEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger garamHapus" role="button" idGaramHapus="' . $data->id . '" tahunGaram="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" uraian="' . $data->uraian . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.garam.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.garam.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Garam::create($request->validated());

        return redirect('/statistik-menu/pertanian/garam');
    }

    public function edit($id)
    {
        $garam = Garam::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.garam.edit', compact('garam', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Garam::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/garam');
    }

    public function destroy($id)
    {
        Garam::destroy($id);

        return redirect('/statistik-menu/pertanian/garam');
    }
}
