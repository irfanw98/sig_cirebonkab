<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Desa;
use App\Models\Admin\Statistik\Pemerintahan;
use App\Http\Requests\Statistik\Pemerintahan\{
    StoreRequest,
    UpdateRequest
};

class PemerintahanController extends Controller
{
    public function index(Request $request)
    {
        $pemerintahan = Pemerintahan::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($pemerintahan)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                        <a href="" class="btn btn-success pemerintahanEdit" role="button" idPemerintahanEdit="' . $data->id_pemerintahan . '"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="" class="btn btn-danger pemerintahanHapus" role="button" idPemerintahanHapus="' . $data->id_pemerintahan . '" tahunPemerintahan="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
                    ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_pemerintahan')
                ->make(true);
        }

        return view('admin.statistik.pemerintahan.index');
    }

    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.pemerintahan.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Pemerintahan::create($request->validated());

        return redirect('/statistik-menu/pemerintahan');
    }

    public function edit($id)
    {
        $pemerintahan = Pemerintahan::with('desa')->findOrFail($id);
        $desas = Desa::orderBy('id_desa', 'DESC')->get();

        return view('admin.statistik.pemerintahan.edit', compact('pemerintahan', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Pemerintahan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pemerintahan');
    }

    public function destroy($id)
    {
        Pemerintahan::destroy($id);

        return redirect('/statistik-menu/pemerintahan');
    }
}
