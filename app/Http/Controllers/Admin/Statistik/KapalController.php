<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Kapal;
use App\Http\Requests\Statistik\Kapal\{
    StoreRequest,
    UpdateRequest
};

class KapalController extends Controller
{
    public function index(Request $request)
    {
        $kapal = Kapal::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($kapal)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success kapalEdit" role="button" idKapalEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger kapalHapus" role="button" idKapalHapus="' . $data->id . '" tahunKapal="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" kategoriKapal="' . $data->kategori_kapal . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.kapal.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.kapal.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Kapal::create($request->validated());

        return redirect('/statistik-menu/pertanian/kapal');
    }

    public function edit($id)
    {
        $kapal = Kapal::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.kapal.edit', compact('kapal', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Kapal::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/kapal');
    }

    public function destroy($id)
    {
        Kapal::destroy($id);

        return redirect('/statistik-menu/pertanian/kapal');
    }
}
