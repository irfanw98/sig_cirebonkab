<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Statistik\Sumberairminum;
use App\Http\Requests\Statistik\Sumberairminum\{
    StoreRequest,
    UpdateRequest
};

class SumberairminumController extends Controller
{

    public function index(Request $request)
    {
        $sumberairminum = Sumberairminum::with('kecamatan')
            ->orderBy('kode_kecamatan', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($sumberairminum)
                ->addColumn('nama_kecamatan', function ($row) {
                    return $row->kecamatan->nama_kecamatan;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success sumberairminumEdit" role="button" idSumberairminumEdit="' . $data->id . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger sumberairminumHapus" role="button" idSumberairminumHapus="' . $data->id . '" tahunSumberairminum="' . $data->tahun . '" namaKecamatan="' . $data->kecamatan->nama_kecamatan . '" sumberairMinum="' . $data->sumber_air_minum . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id')
                ->make(true);
        }

        return view('admin.statistik.sumberairminum.index');
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.sumberairminum.tambah', compact('kecamatans'));
    }

    public function store(StoreRequest $request)
    {
        Sumberairminum::create($request->validated());

        return redirect('/statistik-menu/energi/sumber-air-minum');
    }

    public function edit($id)
    {
        $sumberairminum = Sumberairminum::with('kecamatan')->findOrFail($id);
        $kecamatans = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        return view('admin.statistik.sumberairminum.edit', compact('sumberairminum', 'kecamatans'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Sumberairminum::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/energi/sumber-air-minum');
    }

    public function destroy($id)
    {
        Sumberairminum::destroy($id);

        return redirect('/statistik-menu/energi/sumber-air-minum');
    }
}
