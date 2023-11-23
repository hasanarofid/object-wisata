<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
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
                'nama' => 'Toilet yang Memadai',
            ],
            [
                'nama' => 'Tempat Sampah',            ],
            [
                'nama' => 'Ramah Difabel',            ],
        ];

        foreach ($data as $row) {
            DB::table('fasilitas')->insert([
                'nama' => $row['nama']
            ]);
        }
    }
}
