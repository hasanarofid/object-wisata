<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif';

    public function pantai()
    {
        return $this->belongsTo(Pantai::class);
    }

    function hitungSkorR($k1, $k2, $k3, $k4, $k5, $k6) {
        // Hitung jarak antara alternatif dan PIS untuk setiap kriteria
        $pisK1 = Kriteria::select('bobot_kriteria')->where('nama_kriteria','K1')->first();
        $pisK2 = Kriteria::select('bobot_kriteria')->where('nama_kriteria','K2')->first();
        $pisK3 = Kriteria::select('bobot_kriteria')->where('nama_kriteria','K3')->first();
        $pisK4 = Kriteria::select('bobot_kriteria')->where('nama_kriteria','K4')->first();
        $pisK5 = Kriteria::select('bobot_kriteria')->where('nama_kriteria','K5')->first();
        $pisK6 = Kriteria::select('bobot_kriteria')->where('nama_kriteria','K6')->first();
     
        $jarakK1 = abs($k1 - $pisK1->bobot_kriteria);
        $jarakK2 = abs($k2 - $pisK2->bobot_kriteria);
        $jarakK3 = abs($k3 - $pisK3->bobot_kriteria);
        $jarakK4 = abs($k4 - $pisK4->bobot_kriteria);
        $jarakK5 = abs($k5 - $pisK5->bobot_kriteria);
        $jarakK6 = abs($k6 - $pisK6->bobot_kriteria);
    
        // Hitung Skor R sebagai jarak terjauh
        $skorR = max($jarakK1, $jarakK2, $jarakK3, $jarakK4, $jarakK5, $jarakK6);
        return $skorR;
    }


    function hitungSkorS($k1, $k2, $k3, $k4, $k5, $k6) {
        // Hitung jarak antara alternatif dan NIS untuk setiap kriteria
        $nisK1 = Kriteria::select('skala_prioritas')->where('nama_kriteria','K1')->first();
        $nisK2 = Kriteria::select('skala_prioritas')->where('nama_kriteria','K2')->first();
        $nisK3 = Kriteria::select('skala_prioritas')->where('nama_kriteria','K3')->first();
        $nisK4 = Kriteria::select('skala_prioritas')->where('nama_kriteria','K4')->first();
        $nisK5 = Kriteria::select('skala_prioritas')->where('nama_kriteria','K5')->first();
        $nisK6 = Kriteria::select('skala_prioritas')->where('nama_kriteria','K6')->first();
      
        $jarakK1 = abs($k1 - $nisK1->skala_prioritas);
        $jarakK2 = abs($k2 - $nisK2->skala_prioritas);
        $jarakK3 = abs($k3 - $nisK3->skala_prioritas);
        $jarakK4 = abs($k4 - $nisK4->skala_prioritas);
        $jarakK5 = abs($k5 - $nisK5->skala_prioritas);
        $jarakK6 = abs($k6 - $nisK6->skala_prioritas);
    
        // Hitung Skor S sebagai jarak total
        $skorS = $jarakK1 + $jarakK2 + $jarakK3 + $jarakK4 + $jarakK5 + $jarakK6;
    
        return $skorS;
    }

    function hitungSkorQ($skorR, $skorS) {
        $alpha = 0.5;
        $beta = 1;
        // Sesuaikan rumus sesuai kebutuhan bisnis
        $skorQ = $alpha * $skorR + $beta * $skorS;
    
        return $skorQ;
    }

}
