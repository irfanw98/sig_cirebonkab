<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Nelayan;
use App\Http\Requests\Statistik\Nelayan\{
    StoreRequest,
    UpdateRequest
};

class NelayanController extends Controller
{

    public function index(Request $request)
    {
        $nelayan = Nelayan::with('kecamatan')->orderBy('kode_kecamatan', 'ASC')->orderBy('tahun', 'DESC')->get();

        if ($request->ajax()) {
            return DataTables::of($nelayan)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success nelayanEdit" role="button" idNelayanEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger nelayanHapus" role="button" idNelayanHapus="' . $data->id . '" tahunNelayan="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisNelayan="' . $data->jenis_nelayan . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.nelayan.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.nelayan.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Nelayan::create($request->validated());

        return redirect('/statistik-menu/pertanian/nelayan');
    }

    public function edit($id)
    {
        $nelayan = Nelayan::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.nelayan.edit', compact('nelayan', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Nelayan::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/pertanian/nelayan');
    }

    public function destroy($id)
    {
        Nelayan::destroy($id);

        return redirect('/statistik-menu/pertanian/nelayan');
    }
}
