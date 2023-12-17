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
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '8',
                'k4' => '3',
                'k5' => '24',
                'k6' => '4,1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '1',
            ],
            //2
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '',
                'k3' => '7',
                'k4' => '3',
                'k5' => '8',
                'k6' => '4,1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '2',
            ],
            //3
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '7',
                'k4' => '3',
                'k5' => '11',
                'k6' => '4,2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '3',
            ],
            //4
            [
                'alternatif' => 'K1',
                'k1' => '30000',
                'k2' => '0',
                'k3' => '8',
                'k4' => '5',
                'k5' => '8',
                'k6' => '4,1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '4',
            ],
            //5
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '7',
                'k4' => '3',
                'k5' => '11',
                'k6' => '4,1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '5',
            ],
            //6
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '4',
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
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '5',
                'k4' => '0',
                'k5' => '24',
                'k6' => '3,8',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '7',
            ],
            //8
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '4',
                'k4' => '0',
                'k5' => '8',
                'k6' => '4,2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '8',
            ],
            //9
            [
                'alternatif' => 'K1',
                'k1' => '40000',
                'k2' => '0',
                'k3' => '7',
                'k4' => '4',
                'k5' => '11',
                'k6' => '4,1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '9',
            ],
            //10
            [
                'alternatif' => 'K1',
                'k1' => '8000',
                'k2' => '0',
                'k3' => '6',
                'k4' => '1',
                'k5' => '11',
                'k6' => '3,5',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '10',
            ],
            //11
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '7',
                'k4' => '3',
                'k5' => '11',
                'k6' => '4,2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '11',
            ],
            //12 
            [
                'alternatif' => 'K1',
                'k1' => '40000',
                'k2' => '0',
                'k3' => '7',
                'k4' => '3',
                'k5' => '13',
                'k6' => '4,2',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '12',
            ],
            //13 
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '5',
                'k4' => '0',
                'k5' => '8',
                'k6' => '3,9',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '13',
            ],
            //14
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '5',
                'k4' => '2',
                'k5' => '9',
                'k6' => '4,1',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '14',
            ],
            //15 
            [
                'alternatif' => 'K1',
                'k1' => '10000',
                'k2' => '0',
                'k3' => '5',
                'k4' => '0',
                'k5' => '10',
                'k6' => '4',
                'skorR' => '',
                'skorS' => '',
                'skorQ' => '',
                'pantai_id' => '15',
            ],
            
        ];

        foreach ($data as $row) {
            $alternatifInstance = new Alternatif;
            $row['skorR'] = $alternatifInstance->hitungSkorR(
                $row['k1'],
                $row['k2'],
                $row['k3'],
                $row['k4'],
                $row['k5'],
                $row['k6']
            );
            // dd($row['skorR']);
            $row['skorS'] = $alternatifInstance->hitungSkorS(
                $row['k1'],
                $row['k2'],
                $row['k3'],
                $row['k4'],
                $row['k5'],
                $row['k6']
            );
       

            $row['skorQ'] = $alternatifInstance->hitungSkorQ($row['skorR'],$row['skorS']);

            
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
