<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengontrak extends Model
{
    protected $table = "pengontraks";
    protected $fillable = [
        "nama",
        "no_tlp",
    ];
    use HasFactory;
}
