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
                'nama' => 'Waterboom',
            ],
            [
                'nama' => 'Mini Zoo',            ],
            ['nama' => 'Permainan Anak'],
            ['nama' => 'Kapal'],
            ['nama' => 'Banana Boat'],
        ];

        foreach ($data as $row) {
            DB::table('wahana')->insert([
                'nama' => $row['nama']
            ]);
        }
    }
}
