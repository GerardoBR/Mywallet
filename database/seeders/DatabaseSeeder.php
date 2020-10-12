<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\WalletsTableSeeder;
use Database\Seeders\TransfersTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WalletsTableSeeder::class);
        $this->call(TransfersTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
