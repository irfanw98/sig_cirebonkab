<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Transportasi extends Model
{
    use HasFactory;

    protected $table = 'tb_transportasi';
    protected $primaryKey = 'id_transportasi';
    public $timestamps = false;
    protected $guarded = ['id_transportasi'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
