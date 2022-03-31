<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Desa;
use App\Models\Admin\Statistik\Penduduk;
use App\Http\Requests\Statistik\Penduduk\{
    StoreRequest,
    UpdateRequest
};

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $penduduk = Penduduk::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($penduduk)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-success pendudukEdit" role="button" idPendudukEdit="' . $data->id_penduduk . '"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger pendudukHapus" role="button" idPendudukHapus="' . $data->id_penduduk . '" tahunPenduduk="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_penduduk')
                ->make(true);
        }


        return view('admin.statistik.penduduk.index');
    }

    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.penduduk.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Penduduk::create($request->validated());

        return redirect('/statistik-menu/penduduk');
    }

    public function edit($id)
    {
        $penduduk = Penduduk::with('desa')->findOrFail($id);
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.penduduk.edit', compact('penduduk', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Penduduk::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/penduduk');
    }

    public function destroy($id)
    {
        Penduduk::destroy($id);

        return redirect('/statistik-menu/penduduk');
    }
}
