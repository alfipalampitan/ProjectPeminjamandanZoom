<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans'; // ← ini penting

    protected $fillable = [
        'user_id',
        'nama',
        'barang_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'instansi_id',
        'no_telp',
        'keperluan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
