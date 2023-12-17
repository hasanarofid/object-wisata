<?php

use App\Models\Kriteria;
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

        $matriksPerbandingan = [
            [1, 4, 3, 1, 5, 2],
        ];

        $jumlahKriteria = count($matriksPerbandingan);
        $eigenvalue = [];
        $eigenvector = [];

        // Hitung eigenvalues dan eigenvectors
        for ($i = 0; $i < $jumlahKriteria; $i++) {
            list($eigenvalue[$i], $eigenvector[$i]) = $this->hitungEigen($matriksPerbandingan[0]); // Assuming hitungEigen is defined
        }

        // Set weights in the Kriteria table
        for ($i = 0; $i < count($eigenvector[0]); $i++) {
            // Ambil model Kriteria sesuai indeks $i
            $kriteria = Kriteria::find($i + 1);

            // Simpan bobot kriteria ke dalam kolom 'bobot_kriteria'
            $kriteria->bobot_kriteria = $eigenvector[0][$i];
            
            // Simpan juga skala prioritas ke dalam kolom 'skala_prioritas'
            $kriteria->skala_prioritas = $matriksPerbandingan[0][$i];

            // Simpan perbandingan antar kriteria ke dalam kolom 'matriks_perbandingan'
            $kriteria->matriks_perbandingan = json_encode($matriksPerbandingan[0]);

            $kriteria->save();
        }

        
        
    }

    private function hitungEigen($matrix)
    {
        if (!is_array($matrix)) {
            return [0, []];
        }

        $jumlahElemen = count($matrix);
        $eigenvalue = array_sum($matrix) / $jumlahElemen;

        // Normalisasi eigenvector agar total menjadi 1
        $eigenvector = array_map(function ($value) use ($eigenvalue, $jumlahElemen) {
            return $value / ($eigenvalue * $jumlahElemen);
        }, $matrix);
        // dd([$eigenvalue, $eigenvector]);

        return [$eigenvalue, $eigenvector];
    }
}
