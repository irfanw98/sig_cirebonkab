<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Desa;
use App\Models\Admin\Statistik\Keuangan;
use App\Http\Requests\Statistik\Keuangan\{
    StoreRequest,
    UpdateRequest
};

class KeuanganController extends Controller
{

    public function index(Request $request)
    {
        $keuangan = Keuangan::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($keuangan)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success keuanganEdit" role="button" idKeuanganEdit="' . $data->id_keuangan . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger keuanganHapus" role="button" idKeuanganHapus="' . $data->id_keuangan . '" tahunKeuangan="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_keuangan')
                ->make(true);
        }

        return view('admin.statistik.keuangan.index');
    }

    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.keuangan.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Keuangan::create($request->validated());

        return redirect('/statistik-menu/keuangan');
    }

    public function edit($id)
    {
        $keuangan = Keuangan::with('desa')->findOrFail($id);
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.keuangan.edit', compact('keuangan', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Keuangan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/keuangan');
    }

    public function destroy($id)
    {
        Keuangan::destroy($id);

        return redirect('/statistik-menu/keuangan');
    }
}
