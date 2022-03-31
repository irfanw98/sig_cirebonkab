<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Desa;
use Illuminate\Http\Request;
use App\Models\Admin\Statistik\Sosial;
use App\Http\Requests\Statistik\Sosial\{
    StoreRequest,
    UpdateRequest
};

class SosialController extends Controller
{
    public function index()
    {
        return view('admin.statistik.sosial.index');
    }

    public function sosial(Request $request)
    {
        $sosial = Sosial::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($sosial)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success sosialEdit" role="button" idSosialEdit="' . $data->id_sosial . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger sosialHapus" role="button" idSosialHapus="' . $data->id_sosial . '" tahunSosial="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_sosial')
                ->make(true);
        }

        return view('admin.statistik.sosial.index');
    }


    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.sosial.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Sosial::create($request->validated());

        return redirect('/statistik-menu/sosial');
    }

    public function edit($id)
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();
        $sosial = Sosial::with('desa')->findOrFail($id);

        return view('admin.statistik.sosial.edit', compact('desas', 'sosial'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Sosial::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/sosial');
    }

    public function destroy($id)
    {
        Sosial::destroy($id);

        return redirect('/statistik-menu/sosial');
    }
}
