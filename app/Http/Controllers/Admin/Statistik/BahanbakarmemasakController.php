<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Bahanbakarmemasak;
use App\Http\Requests\Statistik\Bahanbakarmemasak\{
    StoreRequest,
    UpdateRequest
};

class BahanbakarmemasakController extends Controller
{
    public function index(Request $request)
    {
        $bahanbakarmemasak = Bahanbakarmemasak::with('kecamatan')->orderBy('kode_kecamatan', 'ASC')->orderBy('tahun', 'DESC')->get();

        if ($request->ajax()) {
            return DataTables::of($bahanbakarmemasak)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success bahanbakarmemasakEdit" role="button" idBahanbakarmemasakEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger bahanbakarmemasakHapus" role="button" idBahanbakarmemasakHapus="' . $data->id . '" tahunBahanbakarmemasak="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" jenisBahanbakarmemasak="' . $data->jenis_bahan_bakar . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.bahanbakarmemasak.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.bahanbakarmemasak.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Bahanbakarmemasak::create($request->validated());

        return redirect('/statistik-menu/energi/bahan-bakar-memasak');
    }

    public function edit($id)
    {
        $bahanbakarmemasak = Bahanbakarmemasak::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.bahanbakarmemasak.edit', compact('bahanbakarmemasak', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Bahanbakarmemasak::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/energi/bahan-bakar-memasak');
    }

    public function destroy($id)
    {
        Bahanbakarmemasak::destroy($id);

        return redirect('/statistik-menu/energi/bahan-bakar-memasak');
    }
}
