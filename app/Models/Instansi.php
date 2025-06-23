<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
