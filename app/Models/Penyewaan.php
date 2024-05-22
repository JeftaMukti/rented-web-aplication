<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $tabel = "penyewaan";
    protected $fillable =[
        "id_kontrakan",
        "id_pengontrak",
        "tanggal_mulai",
        "tanggal_berakhir",
        "status_pembayaran",
    ];

    public function kontrakan()
    {
        return $this->belongsTo(Kontrakan::class, 'id_kontrakan');
    }

    public function pengontrak()
    {
        return $this->belongsTo(Pengontrak::class, 'id_pengontrak');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pembayaran');
    }
}
