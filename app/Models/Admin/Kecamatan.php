<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\{
    Desa,
    Wisata
};
use App\Models\Admin\Statistik\{
    Padipalawija,
    Sayuranbuah,
    Perkebunan,
    Ternak,
    Unggas,
    Nelayan,
    Kapal,
    Budidayaperikanan,
    Garam,
    Peneranganjalan,
    Bahanbakarmemasak,
    Sumberairminum,
    Pendidikan,
    Fasilitasjamban
};

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'tb_kecamatan';
    protected $primaryKey = 'kode_kecamatan';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'kode_kecamatan',
        'nama_kecamatan',
        'geojson',
        'warna_wilayah_kecamatan'
    ];

    public function desa()
    {
        return $this->hasMany(Desa::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function padipalawija()
    {
        return $this->hasMany(Padipalawija::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function sayuranbuah()
    {
        return $this->hasMany(Sayuranbuah::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function perkebunan()
    {
        return $this->hasMany(Perkebunan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function ternak()
    {
        return $this->hasMany(Ternak::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function unggas()
    {
        return $this->hasMany(Unggas::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function nelayan()
    {
        return $this->hasMany(Nelayan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function kapal()
    {
        return $this->hasMany(Kapal::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function budidayaperikanan()
    {
        return $this->hasMany(Budidayaperikanan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function garam()
    {
        return $this->hasMany(Garam::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function peneranganjalan()
    {
        return $this->hasMany(Peneranganjalan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function bahanbakarmemasak()
    {
        return $this->hasMany(Bahanbakarmemasak::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function sumberairminum()
    {
        return $this->hasMany(Sumberairminum::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function fasilitasjamban()
    {
        return $this->hasMany(Fasilitasjamban::class, 'kode_kecamatan', 'kode_kecamatan');
    }
}
