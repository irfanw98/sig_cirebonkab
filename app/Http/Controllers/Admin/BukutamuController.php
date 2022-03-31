<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bukutamu;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukutamuController extends Controller
{

    public function index(Request $request)
    {
        $buku_tamu = DB::table('tb_buku_tamu')->orderBy('created_at', 'DESC')->get();

        if ($request->ajax()) {
            return DataTables::of($buku_tamu)
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-info pesanDetail" role="button" idDetailPesan="' . $data->id_buku_tamu . '"><i class="fas fa-comment"></i> Pesan</a>
                    <a href="" class="btn btn-danger bukutamuHapus" role="button" idBukutamuHapus="' . $data->id_buku_tamu . '" nama_lengkap="' . $data->nama_lengkap . '"><i class="fa fa-trash"></i> Hapus</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_buku_tamu')
                ->make(true);
        }


        return view('admin.bukutamu.index');
    }

    public function show($id)
    {
        $buku_tamu = Bukutamu::findOrFail($id);

        return view('admin.bukutamu.pesan', compact('buku_tamu'));
    }

    public function destroy($id)
    {
        $buku_tamu = Bukutamu::findOrFail($id);
        $buku_tamu->delete();

        return redirect('/bukutamu-menu');
    }
}
