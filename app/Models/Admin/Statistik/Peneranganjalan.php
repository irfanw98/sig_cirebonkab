<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Kecamatan;

class Peneranganjalan extends Model
{
    use HasFactory;

    protected $table = 'tb_keberadaan_penerangan_jalan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }
}
