<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PantaiSeeder extends Seeder
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
                'nama' => 'Pantai Wong Rame',
                'gambar' => '["gambar_pantai_a.jpg","gambar_pantai_b.jpg"]',
                'jarak' => '10 km',
                'lokasi' => 'Lokasi A',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2',
                'wahana' => '1,2,3',
                'waktu_operasional' => '08:00 - 18:00',
                'ulasan' => 'Ulasan A',
                'latitude'=>'3.658708839514589',
                'longitude'=>'98.97047927143899',
                'link_maps'=>'https://maps.app.goo.gl/YHDZANTg8KtnXJNL9',

            ],
            [
                'nama' => 'Pantai Bali Lestari',
                'gambar' => '["gambar_pantai_c.jpg","gambar_pantai_d.jpg"]',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2',
                'wahana' => '1,2,3',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.6577460427528563',
                'longitude'=>'98.97971295275272',
                'link_maps'=>'https://maps.app.goo.gl/eKDU6ks59Ji43f7J6',
            ],
            [
                'nama' => 'Pantai Pondok Permai',
                'gambar' => '["gambar_pantai_e.jpg","gambar_pantai_f.jpg"]',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2',
                'wahana' => '1,2,3',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.658387088078467',
                'longitude'=>'98.97047927143899',
                'link_maps'=>'https://maps.app.goo.gl/6yw6uK7Y2jnsKLFh8',
            ],

            [
                'nama' => 'Panati Cermin Theme Park & Resort Hotel',
                'gambar' => '["gambar_pantai_g.jpg","1701695099.jpg"]',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => '30000',
                'fasilitas' => '1,2',
                'wahana' => '1,2,3',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.6380236323000363',
                'longitude'=>'99.01709226777002',
                'link_maps'=>'https://maps.app.goo.gl/T9nFEacmoySpScre8',
            ],

            
            // Add more data rows as needed
        ];

        foreach ($data as $row) {
            DB::table('tabel_pantai')->insert([
                'nama' => $row['nama'],
                'gambar' => $row['gambar'],
                'jarak' => $row['jarak'],
                'lokasi' => $row['lokasi'],
                'biaya_masuk' => $row['biaya_masuk'],
                'fasilitas' => $row['fasilitas'],
                'wahana' => $row['wahana'],
                'waktu_operasional' => $row['waktu_operasional'],
                'ulasan' => $row['ulasan'],
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'link_maps'=>$row['link_maps'],
                'created_at' => now(),
                'updated_at' => now(),
                
            ]);
        }
    }
}
