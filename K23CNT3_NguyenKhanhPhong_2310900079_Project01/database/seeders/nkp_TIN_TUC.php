<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class nkp_TIN_TUC extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 10 rows of fake data into the 'nkp_TIN_TUC' table
        for ($i = 0; $i < 10; $i++) {
            DB::table('nkp_TIN_TUC')->insert([
                'nkpMaTT' => $faker->unique()->word, // Unique identifier for the news article
                'nkpTieuDe' => $faker->sentence, // Title of the news article
                'nkpMoTa' => $faker->text(200), // Description (shorter text)
                'nkpNoiDung' => $faker->paragraph(5), // Content (longer text)
                'nkpNgayDangTin' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'nkpNgayCapNhap' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'nkpHinhAnh' => $faker->imageUrl(), // Random image URL
                'nkpTrangThai' => $faker->numberBetween(0, 1), // Status (0 or 1, assuming binary status)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
