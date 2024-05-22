<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayarans";

    protected $fillable = [
        "id_penyewaan",
        "tanggal_pembayaran",
        "jumlah_pembayaran",
        "status_pembayaran",
    ];

    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'id_penyewaan');
    }
}
