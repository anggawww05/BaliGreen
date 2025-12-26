<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WasteCategory;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = [
            [
                'name' => 'Sisa Makanan / Organik Basah',
                'risk_level' => 10,             // Skor 10: Paling Prioritas
                'base_tolerance_hours' => 24,   // 24 Jam (1 Hari) sebelum busuk parah
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Popok / Pembalut (Residu)',
                'risk_level' => 8,              // Skor 8: Bau menyengat & Bakteri
                'base_tolerance_hours' => 48,   // 48 Jam (2 Hari)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kertas / Kardus',
                'risk_level' => 2,              // Skor 2: Aman, hanya masalah tempat
                'base_tolerance_hours' => 168,  // 168 Jam (1 Minggu)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plastik / Botol Minuman',
                'risk_level' => 1,              // Skor 1: Sangat Aman
                'base_tolerance_hours' => 720,  // 720 Jam (30 Hari / 1 Bulan)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kaca / Kaleng / Logam',
                'risk_level' => 1,              // Skor 1: Sangat Aman
                'base_tolerance_hours' => 720,  // 720 Jam (30 Hari)
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        WasteCategory::insert($categories);
    }
}
