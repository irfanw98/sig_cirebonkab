<?php

namespace App\Http\Controllers\Admin\Statistik;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Desa;
use App\Models\Admin\Statistik\Transportasi;
use App\Http\Requests\Statistik\Transportasi\{
    StoreRequest,
    UpdateRequest
};

class TransportasiController extends Controller
{

    public function index(Request $request)
    {
        $transportasi = Transportasi::with('desa')
            ->orderBy('id_desa', 'ASC')
            ->orderBy('tahun', 'DESC')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($transportasi)
                ->addColumn('nama_desa', function ($row) {
                    return $row->desa->nama_desa;
                })
                ->addColumn('aksi', function ($data) {
                    return '
                <a href="" class="btn btn-success transportasiEdit" role="button" idTransportasiEdit="' . $data->id_transportasi . '"><i class="fas fa-edit"></i> Ubah</a>
                <a href="" class="btn btn-danger transportasiHapus" role="button" idTransportasiHapus="' . $data->id_transportasi . '" tahuntransportasi="' . $data->tahun . '" namaDesa="' . $data->desa->nama_desa . '"><i class="fa fa-trash"></i> Hapus</a>
            ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_transportasi')
                ->make(true);
        }

        return view('admin.statistik.transportasi.index');
    }

    public function create()
    {
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.transportasi.tambah', compact('desas'));
    }

    public function store(StoreRequest $request)
    {
        Transportasi::create($request->validated());

        return redirect('/statistik-menu/transportasi');
    }

    public function edit($id)
    {
        $transportasi = Transportasi::with('desa')->findOrFail($id);
        $desas = Desa::orderBy('id_desa', 'ASC')->get();

        return view('admin.statistik.transportasi.edit', compact('transportasi', 'desas'));
    }

    public function update(UpdateRequest $request, $id)
    {
        Transportasi::findOrFail($id)->update($request->validated());

        return redirect('/statistik-menu/transportasi');
    }

    public function destroy($id)
    {
        Transportasi::destroy($id);

        return redirect('/statistik-menu/transportasi');
    }
}
