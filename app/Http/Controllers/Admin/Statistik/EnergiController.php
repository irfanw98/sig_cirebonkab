<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use App\Models\Admin\Desa;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Statistik\Energi;
use App\Http\Requests\Statistik\Energi\{
    StoreRequest,
    UpdateRequest
};

class EnergiController extends Controller
{

    public function index(Request $request)
    {
        $energi = Energi::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($energi)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-success energiEdit" role="button" idEnergiEdit="' . $data->id_energi . '"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger energiHapus" role="button" idEnergiHapus="' . $data->id_energi . '" tahunEnergi="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_energi')
                ->make(true);
        }

        return view('admin.statistik.energi.index');
    }

    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.energi.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Energi::create($request->validated());

        return redirect('/statistik-menu/energi');
    }

    public function edit($id)
    {
        $energi = Energi::with('desa')->findOrFail($id);
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.energi.edit', compact('energi', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Energi::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/energi');
    }

    public function destroy($id)
    {
        Energi::destroy($id);

        return redirect('/statistik-menu/energi');
    }
}
