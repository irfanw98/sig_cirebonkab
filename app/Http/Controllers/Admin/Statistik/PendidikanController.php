<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Pendidikan;
use App\Http\Requests\Statistik\Pendidikan\{
    StoreRequest,
    UpdateRequest
};

class PendidikanController extends Controller
{

    public function index(Request $request)
    {
        $pendidikan = Pendidikan::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->orderBy('jenjang', 'ASC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($pendidikan)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success pendidikanEdit" role="button" idPendidikanEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger pendidikanHapus" role="button" idPendidikanHapus="' . $data->id . '" tahunPendidikan="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" namaPendidikan="' . $data->nama_sekolah . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }


        return view('admin.statistik.pendidikan.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.pendidikan.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Pendidikan::create($request->validated());

        return redirect('/statistik-menu/sosial/pendidikan');
    }

    public function edit($id)
    {
        $pendidikan = Pendidikan::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.pendidikan.edit', compact('pendidikan', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Pendidikan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/sosial/pendidikan');
    }

    public function destroy($id)
    {
        Pendidikan::destroy($id);

        return redirect('/statistik-menu/sosial/pendidikan');
    }
}
