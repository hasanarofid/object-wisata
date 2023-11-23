<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WahanaSeeder extends Seeder
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
                'nama' => 'Roling Donut',
            ],
            [
                'nama' => 'Banana Boat',            ],
            [
                'nama' => 'Sepeda Air',            ],
        ];

        foreach ($data as $row) {
            DB::table('wahana')->insert([
                'nama' => $row['nama']
            ]);
        }
    }
}
