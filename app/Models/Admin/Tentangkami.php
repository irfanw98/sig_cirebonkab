<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentangkami extends Model
{
    use HasFactory;

    protected $table = 'tb_tentang_kami';
    protected $primaryKey = 'id_tentang_kami';
    public $timestamps = false;
    protected $guarded = ['id_tentang_kami'];
}
