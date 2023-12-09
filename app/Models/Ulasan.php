<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';
    public function pantai()
    {
        return $this->belongsTo(Pantai::class);
    }
}
