<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Desa;
use App\Models\Admin\Statistik\Geografi;
use App\Http\Requests\Statistik\Geografi\{
    StoreRequest,
    UpdateRequest
};

class GeografiController extends Controller
{

    public function index(Request $request)
    {
        $geografi = Geografi::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($geografi)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-success geografiEdit" role="button" idGeografiEdit="' . $data->id_geografi . '"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger geografiHapus" role="button" idGeografiHapus="' . $data->id_geografi . '" tahunGeografi="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_geografi')
                ->make(true);
        }

        return view('admin.statistik.geografi.index');
    }

    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.geografi.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Geografi::create($request->validated());

        return redirect('/statistik-menu/geografi');
    }

    public function edit($id)
    {
        $geografi = Geografi::with('desa')->findOrFail($id);
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.geografi.edit', compact('geografi', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Geografi::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/geografi');
    }

    public function destroy($id)
    {
        Geografi::destroy($id);

        return redirect('/statistik-menu/geografi');
    }
}
