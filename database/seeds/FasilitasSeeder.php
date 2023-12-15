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
                'nama' => 'Mushola',
            ],
            [
                'nama' => 'Restoran',            ],
            ['nama' => 'Hotel'],
            ['nama' => 'Pondok'],
            ['nama' => 'Toilet'],
            ['nama' => 'Aula'],
            ['nama' => 'Parkir'],
            ['nama' => 'Kantin'],
        ];

        foreach ($data as $row) {
            DB::table('fasilitas')->insert([
                'nama' => $row['nama']
            ]);
        }
    }
}
