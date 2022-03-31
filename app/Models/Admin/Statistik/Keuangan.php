<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Keuangan extends Model
{
    use HasFactory;

    protected $table = 'tb_keuangan';
    protected $primaryKey = 'id_keuangan';
    public $timestamps = false;
    protected $guarded = ['id_keuangan'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
