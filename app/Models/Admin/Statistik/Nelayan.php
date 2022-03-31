<?php

namespace App\Models\Admin\Statistik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Kecamatan;

class Nelayan extends Model
{
    use HasFactory;

    protected $table = 'tb_nelayan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }
}
