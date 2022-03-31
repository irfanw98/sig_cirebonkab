<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Unggas;
use App\Http\Requests\Statistik\Unggas\{
    StoreRequest,
    UpdateRequest
};

class UnggasController extends Controller
{

    public function index(Request $request)
    {
        $unggas = Unggas::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->orderBy('jenis_unggas', 'ASC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($unggas)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success unggasEdit" role="button" idUnggasEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger unggasHapus" role="button" idUnggasHapus="' . $data->id . '" tahunUnggas="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisUnggas="' . $data->jenis_unggas . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.unggas.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.unggas.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Unggas::create($request->validated());
        $unggas = new Unggas;
        $unggas->kode_kecamatan = $request->kode_kecamatan;
        $unggas->tahun = $request->tahun;
        $unggas->jenis_unggas = $request->jenis_unggas;
        $unggas->jumlah_populasi = $request->jumlah_populasi;
        $unggas->save();

        return redirect('/statistik-menu/pertanian/unggas');
    }

    public function edit($id)
    {
        $unggas = Unggas::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.unggas.edit', compact('unggas', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Unggas::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/unggas');
    }

    public function destroy($id)
    {
        Unggas::destroy($id);

        return redirect('/statistik-menu/pertanian/unggas');
    }
}
