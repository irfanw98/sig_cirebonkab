<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Statistik\Padipalawija;
use App\Http\Requests\Statistik\Padipalawija\{
    StoreRequest,
    UpdateRequest
};

class PadipalawijaController extends Controller
{
    public function index(Request $request)
    {
        $padipalawija = Padipalawija::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->orderBy('jenis_tanaman', 'ASC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($padipalawija)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success padipalawijaEdit" role="button" idPadipalawijaEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger padipalawijaHapus" role="button" idPadipalawijaHapus="' . $data->id . '" tahunPadipalawija="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisTanaman="' . $data->jenis_tanaman . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.padipalawija.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.padipalawija.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Padipalawija::create($request->validated());

        return redirect('/statistik-menu/pertanian/padi-palawija');
    }

    public function edit($id)
    {
        $padipalawija = Padipalawija::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.padipalawija.edit', compact('padipalawija', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Padipalawija::findOrfail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/padi-palawija');
    }

    public function destroy($id)
    {
        Padipalawija::destroy($id);

        return redirect('/statistik-menu/pertanian/padi-palawija');
    }
}
