<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukutamu extends Model
{
    use HasFactory;

    protected $table = 'tb_buku_tamu';
    protected $primaryKey = 'id_buku_tamu';
    protected $guarded = ['id_buku_tamu'];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d, M Y H:i');
    }
}
