<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrakan extends Model
{
    protected $table = "kontrakans";
    protected $fillable = [
        'nama',
        'harga',
        'status_ketersedian',
    ];

    use HasFactory;

    public function penyewaan()
    {
        return $this->hasMany(Penyewaan::class);
    }
}
