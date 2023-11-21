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
                'nama' => 'Pantai A',
                'gambar' => 'gambar_pantai_a.jpg',
                'jarak' => '10 km',
                'lokasi' => 'Lokasi A',
                'biaya_masuk' => 'Rp 10.000',
                'fasilitas' => 'Fasilitas A',
                'wahana' => 'Wahana A',
                'waktu_operasional' => '08:00 - 18:00',
                'ulasan' => 'Ulasan A',
            ],
            [
                'nama' => 'Pantai B',
                'gambar' => 'gambar_pantai_b.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
            ],
            [
                'nama' => 'Pantai C',
                'gambar' => 'gambar_pantai_c.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
            ],

            [
                'nama' => 'Pantai D',
                'gambar' => 'gambar_pantai_d.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
            ],

            [
                'nama' => 'Pantai E',
                'gambar' => 'gambar_pantai_e.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
            ],

            [
                'nama' => 'Pantai F',
                'gambar' => 'gambar_pantai_f.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
            ],

            [
                'nama' => 'Pantai G',
                'gambar' => 'gambar_pantai_g.jpg',
                'jarak' => '15 km',
                'lokasi' => 'Lokasi B',
                'biaya_masuk' => 'Rp 15.000',
                'fasilitas' => 'Fasilitas B',
                'wahana' => 'Wahana B',
                'waktu_operasional' => '09:00 - 19:00',
                'ulasan' => 'Ulasan B',
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
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
