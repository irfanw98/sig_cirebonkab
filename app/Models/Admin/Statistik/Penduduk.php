<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'tb_penduduk';
    protected $primaryKey = 'id_penduduk';
    public $timestamps = false;
    protected $guarded = ['id_penduduk'];

    public function desa()
    {
       return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }

}
