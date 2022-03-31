<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Budidayaperikanan;
use App\Http\Requests\Statistik\Budidayaperikanan\{
    StoreRequest,
    UpdateRequest
};

class BudidayaperikananController extends Controller
{

    public function index(Request $request)
    {
        $budidayaperikanan = Budidayaperikanan::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($budidayaperikanan)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success budidayaperikananEdit" role="button" idBudidayaperikananEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger budidayaperikananHapus" role="button" idBudidayaperikananHapus="' . $data->id . '" tahunBudidayaperikanan="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisBudidayaperikanan="' . $data->jenis_budidaya . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.budidayaperikanan.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.budidayaperikanan.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Budidayaperikanan::create($request->validated());

        return redirect('/statistik-menu/pertanian/budidaya-perikanan');
    }

    public function edit($id)
    {
        $budidayaperikanan = Budidayaperikanan::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.budidayaperikanan.edit', compact('budidayaperikanan', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Budidayaperikanan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/budidaya-perikanan');
    }

    public function destroy($id)
    {
        Budidayaperikanan::destroy($id);

        return redirect('/statistik-menu/pertanian/budidaya-perikanan');
    }
}
