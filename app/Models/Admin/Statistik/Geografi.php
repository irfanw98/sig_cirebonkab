<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Geografi extends Model
{
    use HasFactory;

    protected $table = 'tb_geografi';
    protected $primaryKey = 'id_geografi';
    public $timestamps = false;
    protected $guarded = ['id_geografi'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
