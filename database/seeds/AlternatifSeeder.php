<?php

use App\Models\Alternatif;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //1 
            [
                'alternatif' => 'A1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '2',
                'k5' => '24',
                'k6' => '4.1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '1',
            ],
            //2
            [
                'alternatif' => 'A2',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '2',
                'k5' => '8',
                'k6' => '4.1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '2',
            ],
            //3
            [
                'alternatif' => 'A3',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '2',
                'k5' => '11',
                'k6' => '4.2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '3',
            ],
            //4
            [
                'alternatif' => 'A4',
                'k1' => '30000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '3',
                'k5' => '8',
                'k6' => '4.1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '4',
            ],
            //5
            [
                'alternatif' => 'A5',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '2',
                'k5' => '11',
                'k6' => '4.1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '5',
            ],
            //6
            [
                'alternatif' => 'A6',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '1',
                'k4' => '2',
                'k5' => '24',
                'k6' => '4',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '6',
            ],
            //7
            [
                'alternatif' => 'A7',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '2',
                'k4' => '1',
                'k5' => '8',
                'k6' => '3.8',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '7',
            ],
            //8
            [
                'alternatif' => 'A8',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '1',
                'k4' => '1',
                'k5' => '8',
                'k6' => '4.2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '8',
            ],
            //9
            [
                'alternatif' => 'A9',
                'k1' => '40000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '3',
                'k5' => '11',
                'k6' => '4.1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '9',
            ],
            //10
            [
                'alternatif' => 'A10',
                'k1' => '8000',
                'k2' => '0',
                'k3' => '2',
                'k4' => '2',
                'k5' => '11',
                'k6' => '3.5',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '10',
            ],
            //11
            [
                'alternatif' => 'A11',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '2',
                'k5' => '11',
                'k6' => '4.2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '11',
            ],
            //12 
            [
                'alternatif' => 'A12',
                'k1' => '40000',
                'k2' => '0',
                'k3' => '3',
                'k4' => '2',
                'k5' => '13',
                'k6' => '4.2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '12',
            ],
            //13 
            [
                'alternatif' => 'A13',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '2',
                'k4' => '1',
                'k5' => '8',
                'k6' => '3.9',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '13',
            ],
            //14
            [
                'alternatif' => 'A14',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '2',
                'k4' => '2',
                'k5' => '9',
                'k6' => '4.1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '14',
            ],
            //15 
            [
                'alternatif' => 'A15',
                'k1' => '5000',
                'k2' => '0',
                'k3' => '2',
                'k4' => '1',
                'k5' => '10',
                'k6' => '4',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '15',
            ],
            
        ];

        $nilai_skor = [
            '0,2545198052 0,1680917751 0,00345461468',
            '0,2850436876 0,1680917751 0,05339457292',
            '0,2524083045 0,1680917751 0',
            '0,3090567983 0,2401311073 0,3069680072',
            '0,2639692697 0,1680917751 0,01891483232',
            '0,3652774685 0,1680917751 0,184664626',
            '0,549317836 0,3361835502 0,9857720715',
            '0,5032953011 0,3361835502 0,9104748522',
            '0,4037856327 0,3361835502 0,7476676242',
            '0,4450050979 0,1680917751 0,3151065675',
            '0,2579790456 0,1680917751 0,009114259222',
            '0,546942072 0,3361835502 0,9818850971',
            '0,5580141111 0,3361835502 1',
            '0,3504910312 0,1680917751 0,1604726163',
            '0,4977133291 0,3361835502 0,9013422181',
        ];
        
        // Inisialisasi array untuk menyimpan data hasil
        $hasil_data = [];
        
        // Looping untuk memproses setiap baris data
        foreach ($nilai_skor as $index => $nilai) {
            // Pisahkan nilai dengan spasi
            $nilai_array = explode(' ', $nilai);
        
            // Masukkan data ke dalam array
            $hasil_data[] = [
                'skorR' => $nilai_array[0],
                'skorS' => $nilai_array[1],
                'skorQ' => $nilai_array[2],
            ];
        
            // Update nilai 'skorR', 'skorS', dan 'skorQ' dalam array $data
            $data[$index]['skorR'] = $nilai_array[0];
            $data[$index]['skorS'] = $nilai_array[1];
            $data[$index]['skorQ'] = $nilai_array[2];
        }
        
        // Tampilkan hasil array $data
        // dd($data);

        foreach ($data as $row) {
            // $alternatifInstance = new Alternatif;
            // $row['skorR'] = $alternatifInstance->hitungSkorR(
            //     $row['k1'],
            //     $row['k2'],
            //     $row['k3'],
            //     $row['k4'],
            //     $row['k5'],
            //     $row['k6']
            // );
            // // dd($row['skorR']);
            // $row['skorS'] = $alternatifInstance->hitungSkorS(
            //     $row['k1'],
            //     $row['k2'],
            //     $row['k3'],
            //     $row['k4'],
            //     $row['k5'],
            //     $row['k6']
            // );
       

            // $row['skorQ'] = $alternatifInstance->hitungSkorQ($row['skorR'],$row['skorS']);

            
            DB::table('alternatif')->insert([
                'alternatif' => $row['alternatif'],
                'k1' => $row['k1'],
                'k2' => $row['k2'],
                'k3' => $row['k3'],
                'k4' => $row['k4'],
                'k5' => $row['k5'],
                'k6' => $row['k6'],
                'skorR' => $row['skorR'],
                'skorS' => $row['skorS'],
                'skorQ' => $row['skorQ'],
                'pantai_id' => $row['pantai_id'],
            ]);
        }
    }
}
