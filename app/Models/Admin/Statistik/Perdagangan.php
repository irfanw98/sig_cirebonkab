<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Perdagangan extends Model
{
    use HasFactory;

    protected $table = 'tb_perdagangan';
    protected $primaryKey = 'id_perdagangan';
    public $timestamps = false;
    protected $guarded = ['id_perdagangan'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
