<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PantaiSeeder::class);
        $this->call(FasilitasSeeder::class);
        $this->call(WahanaSeeder::class);

    }
}
