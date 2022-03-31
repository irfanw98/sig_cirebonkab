<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\{
	Kecamatan,
	Desa
};

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'tb_wisata';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function Kecamatan()
    {
    	return $this->belongsTo(Kecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }

    public function desa()
    {
    	return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
