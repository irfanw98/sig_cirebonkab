<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Bukutamu\StoreRequest;
use App\Models\Admin\{
    Bukutamu,
    Tentangkami,
    Desa,
    Kecamatan,
    Wisata
};
use App\Models\Admin\Statistik\{
    Geografi,
    Pemerintahan,
    Penduduk,
    Sosial,
    Padipalawija,
    Sayuranbuah,
    Perkebunan,
    Ternak,
    Unggas,
    Nelayan,
    Kapal,
    Budidayaperikanan,
    Garam,
    Energi,
    Perdagangan,
    Transportasi,
    Keuangan
};

class WebController extends Controller
{
    public function index()
    {
        $desas = Desa::with('kecamatan')->get();
        $kecamatans = Kecamatan::with('desa')->get();

        return view('welcome', compact('desas', 'kecamatans'));
    }

    public function kecamatan($kecamatan)
    {
        $desas = Desa::with('kecamatan')->get();
        $kecamatans = Kecamatan::with('desa')->get();
        $kecamatan = Kecamatan::with('desa')->findOrFail($kecamatan);

        return view('frontend.kecamatan', compact('kecamatan', 'kecamatans', 'desas'));
    }

    public function desa($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan', 'wisata')->findOrFail($desa);

        return view('frontend.desa', compact('desas', 'kecamatans', 'desa'));
    }

    public function statistik($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);

        return view('frontend.statistik', compact('desas', 'kecamatans', 'desa'));
    }

    public function geografi($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $geografis = Geografi::with('desa')->where('id_desa', $desa->id_desa)->get();

        return view('frontend.geografi', compact('desas', 'desa', 'kecamatans', 'geografis'));
    }

    public function pemerintahan($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $pemerintahans = Pemerintahan::with('desa')->where('id_desa', $desa->id_desa)->get();

        return view('frontend.pemerintahan', compact('desas', 'desa', 'kecamatans', 'pemerintahans'));
    }

    public function penduduk($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $penduduks = Penduduk::with('desa')->where('id_desa', $desa->id_desa)->get();

        return view('frontend.penduduk', compact('desas', 'desa', 'kecamatans', 'penduduks'));
    }

    public function sosial($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $sosials = Sosial::with('desa')->where('id_desa', $desa->id_desa)->get();

        return view('frontend.sosial', compact('desas', 'desa', 'kecamatans', 'sosials'));
    }

    public function pertanian($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $padipalawijas = Padipalawija::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('jenis_tanaman');

        $sayuranbuahs = Sayuranbuah::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('jenis_tanaman');

        $perkebunans = Perkebunan::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('jenis_tanaman');

        $ternaks = Ternak::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('jenis_ternak');

        $unggas = Unggas::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('jenis_unggas');

        $nelayans = Nelayan::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('jenis_nelayan');
     
        $kapals = Kapal::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('kategori_kapal');

        $budidayas = Budidayaperikanan::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('jenis_budidaya');

        $garams = Garam::with('kecamatan')
                                    ->where('kode_kecamatan', $desa->kode_kecamatan)
                                    ->get()
                                    ->groupBy('uraian');

        return view('frontend.pertanian', compact(
            'kecamatans',
            'desas',
            'desa',
            'padipalawijas',
            'sayuranbuahs',
            'perkebunans',
            'ternaks',
            'unggas',
            'nelayans',
            'kapals',
            'budidayas',
            'garams'
        ));
    }

    public function energi($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $energis = Energi::with('desa')->where('id_desa', $desa->id_desa)->get();

        return view('frontend.energi', compact('desas', 'desa', 'kecamatans', 'energis'));
    }

    public function perdagangan($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $perdagangans = Perdagangan::with('desa')->where('id_desa', $desa->id_desa)->get();

        return view('frontend.perdagangan', compact('desas', 'desa', 'kecamatans', 'perdagangans'));
    }

    public function transportasi($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $transportasis = Transportasi::with('desa')->where('id_desa', $desa->id_desa)->orderBy('tahun', 'DESC')->get();

        return view('frontend.transportasi', compact('desas', 'desa', 'kecamatans', 'transportasis'));
    }

    public function keuangan($desa)
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $desa = Desa::with('kecamatan')->findOrFail($desa);
        $keuangans = Keuangan::with('desa')->where('id_desa', $desa->id_desa)->orderBy('tahun', 'DESC')->get();

        return view('frontend.keuangan', compact('desas', 'desa', 'kecamatans', 'keuangans'));
    }

    public function bukutamu()
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();

        return view('frontend.bukutamu', compact('desas', 'kecamatans'));
    }

    public function bukutamuStore(StoreRequest $request)
    {
        $bukutamu = new Bukutamu;
        $bukutamu->nama_lengkap = $request->nama_lengkap;
        $bukutamu->email = $request->email;
        $bukutamu->nomor_tlp = $request->nomor_tlp;
        $bukutamu->pesan = strip_tags($request->pesan);
        $bukutamu->save();

        return redirect('/buku-tamu');
    }

    public function tentangkami()
    {
        $kecamatans = Kecamatan::with('desa')->get();
        $desas = Desa::with('kecamatan')->get();
        $tentangkamis = Tentangkami::all();

        return view('frontend.tentangkami', compact('tentangkamis', 'desas', 'kecamatans'));
    }
}
