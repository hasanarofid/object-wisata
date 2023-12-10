<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_kriteria' => 'K1',
                'tipe_kriteria' => 'Biaya masuk (Rp)',
                'skala_prioritas' => '1',
            ],
            [
                'nama_kriteria' => 'K2',
                'tipe_kriteria' => 'Jarak (m) ',
                'skala_prioritas' => '4',
            ],
            [
                'nama_kriteria' => 'K3',
                'tipe_kriteria' => 'Fasilitas',
                'skala_prioritas' => '3',
            ],
            [
                'nama_kriteria' => 'K4',
                'tipe_kriteria' => 'Wahana',
                'skala_prioritas' => '1',
            ],
            [
                'nama_kriteria' => 'K5',
                'tipe_kriteria' => 'Waktu Operasional (Jam) ',
                'skala_prioritas' => '5',
            ],
            [
                'nama_kriteria' => 'K6',
                'tipe_kriteria' => 'Ulasan (Bintang)',
                'skala_prioritas' => '2',
            ],
          
        ];

        foreach ($data as $row) {
            DB::table('kriteria')->insert([
                'nama_kriteria' => $row['nama_kriteria'],
                'tipe_kriteria' => $row['tipe_kriteria'],
                'skala_prioritas' => $row['skala_prioritas']
            ]);
        }
    }
}
