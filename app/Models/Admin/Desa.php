<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\{
    Kecamatan,
    Wisata
};
use App\Models\Admin\Statistik\{
    Geografi,
    Pemerintahan,
    Penduduk,
    Sosial,
    Perdagangan,
    Transportasi,
    Keuangan,
    Energi
};

class Desa extends Model
{
    use HasFactory;

    protected $table = 'tb_desa';
    protected $primaryKey = 'id_desa';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id_desa',
        'kode_kecamatan',
        'kode_desa',
        'nama_desa',
        'foto',
        'geojson',
        'warna_wilayah_desa',
        'latitude',
        'longitude',
        'deskripsi'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'id_desa', 'id_desa');
    }

    public function geografi()
    {
        return $this->hasMany(Geografi::class, 'id_desa', 'id_desa');
    }

    public function pemerintahan()
    {
        return $this->hasMany(Pemerintahan::class, 'id_desa', 'id_desa');
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_desa', 'id_desa');
    }

    public function sosial()
    {
        return $this->hasMany(Sosial::class, 'id_desa', 'id_desa');
    }

    public function perdagangan()
    {
        return $this->hasMany(Perdagangan::class, 'id_desa', 'id_desa');
    }

    public function transportasi()
    {
        return $this->hasMany(Transportasi::class, 'id_desa', 'id_desa');
    }

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class, 'id_desa', 'id_desa');
    }

    public function energi()
    {
        return $this->hasMany(Energi::class, 'id_desa', 'id_desa');
    }
}
