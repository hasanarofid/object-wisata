<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pantai extends Model
{
    protected $table = 'tabel_pantai';
    protected $fillable = [
        'nama',
        'lokasi',
        'biaya_masuk',
        'latitude',
        'longitude',
        'fasilitas',
        'wahana',
        'waktu_operasional',
        'gambar',
        // Add other attributes as needed
    ];

}
