<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Sosial extends Model
{
    use HasFactory;

    protected $table = 'tb_sosial';
    protected $primaryKey = 'id_sosial';
    public $timestamps = false;
    protected $guarded = ['id_sosial'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
