<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';
    protected $fillable = [
        'nama',
        'no_telp',
        'nama_barang',
        'lokasi',
        'tanggal',
        'foto_barang',
        'keterangan',
        'disetujui'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
