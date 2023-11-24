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
                'gambar' => 'gambar_pantai_a.jpg',
                'jarak' => '10 km',
                'lokasi' => 'Lokasi A',
                'biaya_masuk' => 'Rp 10.000',
                'fasilitas' => 'Fasilitas A',
                'wahana' => 'Wahana A',
                'waktu_operasional' => '08:00 - 18:00',
                'ulasan' => 'Ulasan A',
                'latitude'=>'3.658708839514589',
                'longitude'=>'98.97047927143899',
            ],
            [
                'nama' => 'Pantai Bali Lestari',
                'gambar' => 'gambar_pantai_b.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.6577460427528563',
                'longitude'=>'98.97971295275272',
            ],
            [
                'nama' => 'Pantai Pondok Permai',
                'gambar' => 'gambar_pantai_c.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.658387088078467',
                'longitude'=>'98.97047927143899',
            ],

            [
                'nama' => 'Pantai Sri Mersing',
                'gambar' => 'gambar_pantai_d.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.6380236323000363',
                'longitude'=>'99.01709226777002',
            ],

            [
                'nama' => 'Pantai Kuala Putri',
                'gambar' => 'gambar_pantai_e.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.6334648801077316',
                'longitude'=>'99.01932552642894',
            ],

            [
                'nama' => 'Pantai Pematik Matik',
                'gambar' => 'gambar_pantai_f.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.585877457592354',
                'longitude'=>'99.09955564484311',
            ],

            [
                'nama' => 'Pantai Cemara Kembar',
                'gambar' => 'gambar_pantai_g.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
                'latitude'=>'3.59772136227925',
                'longitude'=>'99.08686446483837',
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
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
