<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Energi extends Model
{
    use HasFactory;

    protected $table = 'tb_energi';
    protected $primaryKey = 'id_energi';
    public $timestamps = false;
    protected $guarded = ['id_energi'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
