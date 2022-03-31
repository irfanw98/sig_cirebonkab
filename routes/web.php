<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    LogoutController,
    WebController
};
use App\Http\Controllers\Admin\{
    DashboardController,
    KecamatanController,
    DesaController,
    WisataController,
    BukutamuController,
    TentangkamiController,
};
use App\Http\Controllers\Admin\Statistik\{
    GeografiController,
    PemerintahanController,
    PendudukController,
    SosialController,
    PendidikanController,
    FasilitasjambanController,
    PadipalawijaController,
    SayuranbuahController,
    PerkebunanController,
    TernakController,
    UnggasController,
    NelayanController,
    KapalController,
    BudidayaperikananController,
    GaramController,
    PerdaganganController,
    TransportasiController,
    KeuanganController,
    EnergiController,
    PeneranganjalanController,
    BahanbakarmemasakController,
    SumberairminumController
};


Route::get('/', [WebController::class, 'index']);
Route::get('/kecamatan/{kecamatan}', [WebController::class, 'kecamatan']);
Route::group(['prefix' => 'statistik'], function () {
    Route::get('/{desa}', [WebController::class, 'statistik']);
    Route::get('/geografi/{desa}', [WebController::class, 'geografi']);
    Route::get('/pemerintahan/{desa}', [WebController::class, 'pemerintahan']);
    Route::get('/penduduk/{desa}', [WebController::class, 'penduduk']);
    Route::get('/sosial/{desa}', [WebController::class, 'sosial']);
    Route::get('/pertanian/{desa}', [WebController::class, 'pertanian']);
    Route::get('/energi/{desa}', [WebController::class, 'energi']);
    Route::get('/perdagangan/{desa}', [WebController::class, 'perdagangan']);
    Route::get('/transportasi/{desa}', [WebController::class, 'transportasi']);
    Route::get('/keuangan/{desa}', [WebController::class, 'keuangan']);
});

Route::get('/desa/{desa}', [WebController::class, 'desa']);
Route::get('/buku-tamu', [WebController::class, 'bukutamu']);
Route::post('/buku-tamu', [WebController::class, 'bukutamuStore']);
Route::get('/tentang-kami', [WebController::class, 'tentangkami']);


Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/kecamatan-menu', KecamatanController::class);
    Route::resource('/desa-menu', DesaController::class);
    Route::group(['prefix' => 'statistik-menu'], function () {
        Route::resource('/geografi', GeografiController::class);
        Route::resource('/pemerintahan', PemerintahanController::class);
        Route::resource('/penduduk', PendudukController::class);
        Route::post('/sosial-menu', [SosialController::class, 'sosial'])->name('sosial');
        Route::group(['prefix' => 'sosial'], function () {
            Route::resource('/fasilitas-jamban', FasilitasjambanController::class);
            Route::resource('/pendidikan', PendidikanController::class);
        });
        Route::resource('/sosial', SosialController::class);
        Route::group(['prefix' => 'pertanian'], function () {
            Route::resource('/padi-palawija', PadipalawijaController::class);
            Route::resource('/sayuran-buah', SayuranbuahController::class);
            Route::resource('/perkebunan', PerkebunanController::class);
            Route::resource('/ternak', TernakController::class);
            Route::resource('/unggas', UnggasController::class);
            Route::resource('/nelayan', NelayanController::class);
            Route::resource('/kapal', KapalController::class);
            Route::resource('/budidaya-perikanan', BudidayaperikananController::class);
            Route::resource('/garam', GaramController::class);
        });
        Route::resource('/perdagangan', PerdaganganController::class);
        Route::resource('/transportasi', TransportasiController::class);
        Route::resource('/keuangan', KeuanganController::class);
        Route::group(['prefix' => 'energi'], function () {
            Route::resource('/penerangan-jalan', PeneranganjalanController::class);
            Route::resource('/bahan-bakar-memasak', BahanbakarmemasakController::class);
            Route::resource('/sumber-air-minum', SumberairminumController::class);
        });
        Route::resource('/energi', EnergiController::class);
    });
    Route::resource('/wisata-menu', WisataController::class);
    Route::resource('/bukutamu-menu', BukutamuController::class);
    Route::resource('/tentangkami-menu', TentangkamiController::class)->only(['index', 'edit', 'update']);
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
