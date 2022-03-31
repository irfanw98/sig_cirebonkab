<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Requests\Kecamatan\{
    StoreRequest,
    UpdateRequest
};

class KecamatanController extends Controller
{
    public function index(Request $request)
    {
        $kecamatan = Kecamatan::orderBy('kode_kecamatan', 'ASC')->get();

        if ($request->ajax()) {
            return DataTables::of($kecamatan)
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-success kecamatanEdit" role="button" kodeKecamatan="' . $data->kode_kecamatan . '"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="" class="btn btn-danger kecamatanHapus" role="button" kodeKecamatan="' . $data->kode_kecamatan . '" namaKecamatan="' . $data->nama_kecamatan . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.kecamatan.index');
    }

    public function create()
    {
        return view('admin.kecamatan.tambah');
    }

    public function store(StoreRequest $request)
    {
        Kecamatan::create($request->validated());

        return redirect('/kecamatan-menu');
    }

    public function edit($id)
    {
        return view('admin.kecamatan.edit', [
            'kecamatan' => Kecamatan::findOrFail($id),
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        Kecamatan::where('kode_kecamatan', $id)->update($request->validated());

        return redirect('/kecamatan-menu');
    }

    public function destroy($id)
    {
        Kecamatan::destroy($id);

        return redirect('/kecamatan-menu');
    }
}
