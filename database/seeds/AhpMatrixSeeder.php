<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AhpMatrixSeeder extends Seeder
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
                'criteria' => 'Biaya Masuk',
                'biaya_masuk' => '0',
                'jarak' => '-3',
                'fasilitas' => '-3',
                'wahana' => '0',
                'waktu_operasional' => '-4',
                'ulasan' => '-1',
            ],
            [
                'criteria' => 'Jarak',
                'biaya_masuk' => '3',
                'jarak' => '0',
                'fasilitas' => '1',
                'wahana' => '3',
                'waktu_operasional' => '-1',
                'ulasan' => '2',
            ],
            [
                'criteria' => 'Fasilitas',
                'biaya_masuk' => '2',
                'jarak' => '-1',
                'fasilitas' => '0',
                'wahana' => '2',
                'waktu_operasional' => '-2',
                'ulasan' => '1',
            ],
            [
                'criteria' => 'Wahana',
                'biaya_masuk' => '0',
                'jarak' => '-3',
                'fasilitas' => '-2',
                'wahana' => '0',
                'waktu_operasional' => '-4',
                'ulasan' => '-1',
            ],
            [
                'criteria' => 'Waktu Operasional',
                'biaya_masuk' => '4',
                'jarak' => '1',
                'fasilitas' => '2',
                'wahana' => '4',
                'waktu_operasional' => '0',
                'ulasan' => '3',
            ],
            [
                'criteria' => 'Ulasan',
                'biaya_masuk' => '1',
                'jarak' => '-2',
                'fasilitas' => '-1',
                'wahana' => '1',
                'waktu_operasional' => '-3',
                'ulasan' => '0',
            ],
            
        ];

        foreach ($data as $row) {
            DB::table('ahp_matrix')->insert([
                'criteria' => $row['criteria'],
                'biaya_masuk' => $row['biaya_masuk'],
                'jarak' => $row['jarak'],
                'fasilitas' => $row['fasilitas'],
                'wahana' => $row['wahana'],
                'waktu_operasional' => $row['waktu_operasional'],
                'ulasan' => $row['ulasan'],
            ]);
        }
    }
}
