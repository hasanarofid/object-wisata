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
            //1
            [
                'nama' => 'Pantai Wong Rame',
                'gambar' => '["Wongrame/cover.jpeg","Wongrame/1.jpeg","Wongrame/2.jpeg","Wongrame/3.jpeg","Wongrame/4.jpeg","Wongrame/5.jpeg","Wongrame/6.jpeg","Wongrame/7.jpeg","Wongrame/8.jpeg","Wongrame/9.jpeg"]',
                'jarak' => '10 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2,3,4,5,6,7,8',
                'wahana' => '3,4,5',
                'waktu_operasional' => '00:00 - 24:00',
                'ulasan' => '4,1',
                'latitude'=>'3.6583596',
                'longitude'=>'98.9704412',
                'link_maps'=>'https://maps.app.goo.gl/YHDZANTg8KtnXJNL9',
            ],
            //2
            [
                'nama' => 'Pantai Bali Lestari',
                'gambar' => '["balilestari/cover.jpeg","balilestari/1.jpeg","balilestari/2.jpeg","balilestari/3.jpeg","balilestari/4.jpeg","balilestari/5.jpeg","balilestari/6.jpeg","balilestari/7.jpeg","balilestari/8.jpeg","balilestari/9.jpeg","balilestari/10.jpeg","balilestari/11.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2,4,5,6,7,8',
                'wahana' => '3,4,5',
                'waktu_operasional' => '10:00 - 18:00',
                'ulasan' => '4,1',
                'latitude'=>'3.6551768',
                'longitude'=>'98.9791979',
                'link_maps'=>'https://maps.app.goo.gl/eKDU6ks59Ji43f7J6',
            ],
            //3
            [
                'nama' => 'Pantai Pondok Permai',
                'gambar' => '["pondokpermai/cover.jpeg","pondokpermai/1.jpeg","pondokpermai/2.jpeg","pondokpermai/3.jpeg","pondokpermai/4.jpeg","pondokpermai/5.jpeg","pondokpermai/6.jpeg","pondokpermai/7.jpeg","pondokpermai/8.jpeg","pondokpermai/9.jpeg","pondokpermai/10.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2,4,5,6,7,8',
                'wahana' => '3,4,5',
                'waktu_operasional' => '08:00 -  19:00',
                'ulasan' => '4,2',
                'latitude'=>'3.6559035',
                'longitude'=>'98.977593',
                'link_maps'=>'https://maps.app.goo.gl/6yw6uK7Y2jnsKLFh8',
            ],
            //4
            [
                'nama' => 'Pantai Cermin Theme Park & Resort Hotel',
                'gambar' => '["pantaicermin/cover.jpeg","pantaicermin/1.jpeg","pantaicermin/2.jpeg","pantaicermin/3.jpeg","pantaicermin/4.jpeg","pantaicermin/5.jpeg","pantaicermin/6.jpeg","pantaicermin/7.jpeg","pantaicermin/8.jpeg","pantaicermin/9.jpeg","pantaicermin/10.jpeg","pantaicermin/11.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '30000',
                'fasilitas' => '1,2,3,4,5,6,7,8',
                'wahana' => '1,2,3,4,5',
                'waktu_operasional' => '09:00 - 17:00',
                'ulasan' => '4,1',
                'latitude'=>'3.6509583',
                'longitude'=>'98.9853734',
                'link_maps'=>'https://maps.app.goo.gl/T9nFEacmoySpScre8',
            ],
            //5
            [
                'nama' => 'Pantai Sri Mersing',
                'gambar' => '["srimersing/cover.jpeg","srimersing/1.jpeg","srimersing/2.jpeg","srimersing/3.jpeg","srimersing/4.jpeg","srimersing/5.jpeg","srimersing/6.jpeg","srimersing/7.jpeg","srimersing/8.jpeg","srimersing/9.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2,3,4,5,6,7,8',
                'wahana' => '3,4,5',
                'waktu_operasional' => '07:00 - 18:00',
                'ulasan' => '4,1',
                'latitude'=>'3.6325469',
                'longitude'=>'99.017264',
                'link_maps'=>'https://maps.app.goo.gl/paQVHAcAc9MveEJq9',
            ],
            //6
            [
                'nama' => 'Pantai Gudang Garam',
                'gambar' => '["gudanggaram/cover.jpeg","gudanggaram/1.jpeg","gudanggaram/2.jpeg","gudanggaram/3.jpeg","gudanggaram/4.jpeg","gudanggaram/5.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '4,5,7,8',
                'wahana' => '4,5',
                'waktu_operasional' => '00:00 - 24:00',
                'ulasan' => '4',
                'latitude'=>'3.6570383',
                'longitude'=>'98.9732679',
                'link_maps'=>'https://maps.app.goo.gl/WAJENiofUsuVenucA',
            ],
            //7
            [
                'nama' => 'Pantai Kuala Putri',
                'gambar' => '["kualaputri/cover.jpeg","kualaputri/1.jpeg","kualaputri/2.jpeg","kualaputri/3.jpeg","kualaputri/4.jpeg","kualaputri/5.jpeg","kualaputri/6.jpeg","kualaputri/7.jpeg","kualaputri/8.jpeg","kualaputri/9.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,4,5,7,8',
                'wahana' => '',
                'waktu_operasional' => '10:00 - 18:00',
                'ulasan' => '3,8',
                'latitude'=>'3.6297699',
                'longitude'=>'99.0189767',
                'link_maps'=>'https://maps.app.goo.gl/9U9qMhPvKFNu5bhV7',
            ],
            //8
            [
                'nama' => 'Pantai Pematik Matik',
                'gambar' => '["pematik/cover.jpeg","pematik/1.jpeg","pematik/2.jpeg","pematik/3.jpeg","pematik/4.jpeg","pematik/5.jpeg","pematik/6.jpeg","pematik/7.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,5,7,8',
                'wahana' => '',
                'waktu_operasional' => '10:00 - 18:00',
                'ulasan' => '4,2',
                'latitude'=>'3.619151',
                'longitude'=>'99.0543155',
                'link_maps'=>'https://maps.app.goo.gl/tCeCSKPFdiFHs1Ka7',
            ],
            //9
            [
                'nama' => 'Pantai Cemara Kembar',
                'gambar' => '["cemara/cover.jpeg","cemara/1.jpeg","cemara/2.jpeg","cemara/3.jpeg","cemara/4.jpeg","cemara/5.jpeg","cemara/6.jpeg","cemara/7.jpeg","cemara/8.jpeg","cemara/9.jpeg","cemara/10.jpeg","cemara/11.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '40000',
                'fasilitas' => '1,2,4,5,6,7,8',
                'wahana' => '6,3,4,5',
                'waktu_operasional' => '07:00 - 18:00',
                'ulasan' => '4,1',
                'latitude'=>'3.6297699',
                'longitude'=>'99.0189767',
                'link_maps'=>'https://maps.app.goo.gl/GaXMTjMGJZrcfZ2CA',
            ],
            //10
            [
                'nama' => 'Pantai Kurnia My Darling',
                'gambar' => '["kurnia/cover.jpeg","kurnia/1.jpeg","kurnia/2.jpeg","kurnia/3.jpeg","kurnia/4.jpeg","kurnia/5.jpeg","kurnia/6.jpeg","kurnia/7.jpeg","kurnia/8.jpeg","kurnia/9.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '8000',
                'fasilitas' => '1,4,5,6,7,8',
                'wahana' => '4',
                'waktu_operasional' => '07:00 - 18:00',
                'ulasan' => '3,5',
                'latitude'=>'3.661884',
                'longitude'=>'98.9636702',
                'link_maps'=>'https://maps.app.goo.gl/XtTy2PNv2CJQ8WS88',
            ],
            //11
            [
                'nama' => 'Pantai Mangrove',
                'gambar' => '["mangrove/cover.jpeg","mangrove/1.jpeg","mangrove/2.jpeg","mangrove/3.jpeg","mangrove/4.jpeg","mangrove/5.jpeg","mangrove/6.jpeg","mangrove/7.jpeg","mangrove/8.jpeg","mangrove/9.jpeg","mangrove/10.jpeg","mangrove/11.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,2,4,5,6,7,8',
                'wahana' => '7,3,4',
                'waktu_operasional' => '07:00 - 18:00',
                'ulasan' => '4,2',
                'latitude'=>'3.5912316',
                'longitude'=>'99.0917906',
                'link_maps'=>'https://maps.app.goo.gl/rqycHgFyvHYFcQj48',
            ],
            //12
            [
                'nama' => 'Pantai Romantis',
                'gambar' => '["romantis/cover.jpeg","romantis/1.jpeg","romantis/2.jpeg","romantis/3.jpeg","romantis/4.jpeg","romantis/5.jpeg","romantis/6.jpeg","romantis/7.jpeg","romantis/8.jpeg","romantis/9.jpeg","romantis/10.jpeg","romantis/11.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '40000',
                'fasilitas' => '1,2,4,5,6,7,8',
                'wahana' => '3,4,5',
                'waktu_operasional' => '07:00 - 20:00',
                'ulasan' => '4,2',
                'latitude'=>'3.5856526',
                'longitude'=>'99.099502',
                'link_maps'=>'https://maps.app.goo.gl/WvC5i2kaBiB7y4zQ9',
            ],
            //13
            [
                'nama' => 'Pantai Kelang',
                'gambar' => '["kelang/cover.jpeg","kelang/1.jpeg","kelang/2.jpeg","kelang/3.jpeg","kelang/4.jpeg","kelang/5.jpeg","kelang/6.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,4,5,7,8',
                'wahana' => '',
                'waktu_operasional' => '10:00 - 18:00',
                'ulasan' => '3,9',
                'latitude'=>'3.5774009',
                'longitude'=>'99.1061603',
                'link_maps'=>'https://maps.app.goo.gl/JFWysTQvNHwr7xxa8',
            ],
            //14
            [
                'nama' => 'Pantai Sialang Buah',
                'gambar' => '["sialang/cover.jpeg","sialang/1.jpeg","sialang/2.jpeg","sialang/3.jpeg","sialang/4.jpeg","sialang/5.jpeg","sialang/6.jpeg","sialang/7.jpeg","sialang/8.jpeg","sialang/9.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,4,5,7,8',
                'wahana' => '4,5',
                'waktu_operasional' => '08:00 - 17:00',
                'ulasan' => '4,1',
                'latitude'=>'3.5695086',
                'longitude'=>'99.1188732',
                'link_maps'=>'https://maps.app.goo.gl/3Gw6hsNH1hy7MpLB8',
            ],
            //15
            [
                'nama' => 'Pantai Mutiara Sentang Indah',
                'gambar' => '["sentang/cover.jpeg","sentang/1.jpeg","sentang/2.jpeg","sentang/3.jpeg","sentang/4.jpeg","sentang/5.jpeg","sentang/6.jpeg","sentang/7.jpeg","sentang/8.jpeg","sentang/9.jpeg"]',
                'jarak' => '15 km',
                'biaya_masuk' => '10000',
                'fasilitas' => '1,4,5,7,8',
                'wahana' => '',
                'waktu_operasional' => '07:00 - 17:00',
                'ulasan' => '4',
                'latitude'=>'3.5632912',
                'longitude'=>'99.1311293',
                'link_maps'=>'https://maps.app.goo.gl/iCE1qmZoChcxAGyv5',
            ],
            
            
            // Add more data rows as needed
        ];

        foreach ($data as $row) {
            DB::table('tabel_pantai')->insert([
                'nama' => $row['nama'],
                'gambar' => $row['gambar'],
                'jarak' => $row['jarak'],
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
