<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanZoom extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
    
    protected $fillable = [
        'user_id',
        'barang_id',
        'instansi_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'nama_kegiatan',
        'keterangan',
        'status',
    ];
    
    
}
