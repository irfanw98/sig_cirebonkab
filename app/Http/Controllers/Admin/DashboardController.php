<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Desa;
use App\Models\Admin\Bukutamu;

class DashboardController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::count();
        $desa = Desa::count();
        $bukutamu = Bukutamu::count();

        $bukutamuPerbulans = Bukutamu::select(
        								\DB::raw('count(id_buku_tamu) as count'),
        								\DB::raw('DATE_FORMAT(created_at, "%M") as months')
        							)
        							->groupBy('months')
        							->orderBy('created_at', 'asc')
        							->get();

        return view('admin.dashboard', compact(
        	'kecamatan', 
        	'desa', 
        	'bukutamu',
        	'bukutamuPerbulans',
        ));
    }
}
