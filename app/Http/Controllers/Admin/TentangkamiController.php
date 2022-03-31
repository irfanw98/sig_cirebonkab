<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Admin\Tentangkami;
use Yajra\DataTables\DataTables;

class TentangkamiController extends Controller
{
    public function index(Request $request)
    {
        $tentangkami = Tentangkami::all();

        if ($request->ajax()) {
            return DataTables::of($tentangkami)
                ->addColumn('aksi', function ($data) {
                    return '
                    <a href="" class="btn btn-success tentangkamiEdit" role="button" idTentangkamiEdit="' . $data->id_tentang_kami . '"><i class="fas fa-edit"></i> Ubah</a>
                ';
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->removeColumn('id_tentang_kami')
                ->make(true);
        }

        return view('admin.tentangkami.index');
    }

    public function edit(Request $request, $id)
    {
        $tentangkami = Tentangkami::findOrFail($id);

        return view('admin.tentangkami.edit', compact('tentangkami'));
    }

    public function update(Request $request, $id)
    {
        $tentangkami = Tentangkami::findOrFail($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameEdit = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/tentangkami', $filenameEdit);
            $oldFilename = $tentangkami->foto;
            $tentangkami->foto = $filenameEdit;
            Storage::disk('public')->delete("tentangkami/" . $oldFilename);
        } else {
            $filenameEdit = $tentangkami->foto;
        }

        $tentangkami->foto = $filenameEdit;
        $tentangkami->deskripsi = $request->deskripsi;
        $tentangkami->save();

        return redirect('/tentangkami-menu');
    }
}
