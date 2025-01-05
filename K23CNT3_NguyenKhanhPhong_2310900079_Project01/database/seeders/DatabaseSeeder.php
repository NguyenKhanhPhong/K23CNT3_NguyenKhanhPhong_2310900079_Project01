<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            nkp_QUAN_TRITableSeeder::class,
            nkp_LOAI_SAN_PHAMTableSeeder::class,
            nkp_SAN_PHAMTableSeeder::class,
            nkp_KHACH_HANGTableSeeder::class,
            nkp_HOA_DONTableSeeder::class,
            nkp_CT_HOA_DONTableSeeder::class,
            nkp_TIN_TUC::class

        ]);
    }
}
