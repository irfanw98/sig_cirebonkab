<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Statistik\Sayuranbuah;
use App\Http\Requests\Statistik\Sayuranbuah\{
    StoreRequest,
    UpdateRequest
};

class SayuranbuahController extends Controller
{
    public function index(Request $request)
    {
        $sayuranbuah = Sayuranbuah::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->orderBy('jenis_tanaman', 'ASC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($sayuranbuah)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success sayuranbuahEdit" role="button" idSayuranbuahEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger sayuranbuahHapus" role="button" idSayuranbuahHapus="' . $data->id . '" tahunSayuranbuah="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisTanaman="' . $data->jenis_tanaman . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }
        return view('admin.statistik.sayuranbuah.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.sayuranbuah.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Sayuranbuah::create($request->validated());

        return redirect('/statistik-menu/pertanian/sayuran-buah');
    }

    public function edit($id)
    {
        $sayuranbuah = Sayuranbuah::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.sayuranbuah.edit', compact('sayuranbuah', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Sayuranbuah::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/sayuran-buah');
    }

    public function destroy($id)
    {
        Sayuranbuah::destroy($id);

        return redirect('/statistik-menu/pertanian/sayuran-buah');
    }
}
