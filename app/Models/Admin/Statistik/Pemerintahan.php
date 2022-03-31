<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Desa;

class Pemerintahan extends Model
{
    use HasFactory;

    protected $table = 'tb_pemerintahan';
    protected $primaryKey = 'id_pemerintahan';
    public $timestamps = false;
    protected $guarded = ['id_pemerintahan'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }

}
