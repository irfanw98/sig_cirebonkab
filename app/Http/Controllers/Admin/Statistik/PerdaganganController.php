<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Desa;
use App\Models\Admin\Statistik\Perdagangan;
use App\Http\Requests\Statistik\Perdagangan\{
    StoreRequest,
    UpdateRequest
};

class PerdaganganController extends Controller
{
    public function index(Request $request)
    {
        $perdagangan = Perdagangan::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($perdagangan)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-success perdaganganEdit" role="button" idPerdaganganEdit="' . $data->id_perdagangan . '"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger perdaganganHapus" role="button" idPerdaganganHapus="' . $data->id_perdagangan . '" tahunPerdagangan="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_perdagangan')
                ->make(true);
        }

        return view('admin.statistik.perdagangan.index');
    }

    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.perdagangan.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Perdagangan::create($request->validated());

        return redirect('/statistik-menu/perdagangan');
    }

    public function edit($id)
    {
        $perdagangan = Perdagangan::with('desa')->findOrFail($id);
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.perdagangan.edit', compact('perdagangan', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Perdagangan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/perdagangan');
    }

    public function destroy($id)
    {
        Perdagangan::destroy($id);

        return redirect('/statistik-menu/perdagangan');
    }
}
