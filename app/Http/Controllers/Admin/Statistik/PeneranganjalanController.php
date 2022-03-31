<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Peneranganjalan;
use App\Http\Requests\Statistik\Peneranganjalan\{
    StoreRequest,
    UpdateRequest
};

class PeneranganjalanController extends Controller
{

    public function index(Request $request)
    {
        $peneranganjalan = Peneranganjalan::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($peneranganjalan)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success peneranganjalanEdit" role="button" idPeneranganjalanEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger peneranganjalanHapus" role="button" idPeneranganjalanHapus="' . $data->id . '" tahunPeneranganjalan="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" sumberPenerangan="' . $data->sumber_penerangan_jalan . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.peneranganjalan.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.peneranganjalan.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Peneranganjalan::create($request->validated());

        return redirect('/statistik-menu/energi/penerangan-jalan');
    }

    public function edit($id)
    {
        $peneranganjalan = Peneranganjalan::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.peneranganjalan.edit', compact('peneranganjalan', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Peneranganjalan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/energi/penerangan-jalan');
    }

    public function destroy($id)
    {
        Peneranganjalan::destroy($id);

        return redirect('/statistik-menu/energi/penerangan-jalan');
    }
}
