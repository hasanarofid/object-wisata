<?php

use Illuminate\Database\Seeder;
use App\Models\Ulasan;
use App\Models\Pantai;

class UlasanSeeder extends Seeder
{
    public function run()
    {
        // Retrieve some pantai records to associate with ulasans
        $pantais = Pantai::all();

        // Create dummy ulasans
        foreach ($pantais as $pantai) {
            Ulasan::create([
                'pantai_id' => $pantai->id,
                'comment' => 'bagus',
                'rating' => rand(1, 5),
            ]);
        }
    }
}
