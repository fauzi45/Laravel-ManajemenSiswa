<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapels = [
            [
                'kode' => 'M001',
                'nama' => 'Matematika',
                'semester' => 1,
                'guru_id' => 1,
            ],
            [
                'kode' => 'B001',
                'nama' => 'Bahasa Indonesia',
                'semester' => 1,
                'guru_id' => 2
            ],
            [
                'kode' => 'K001',
                'nama' => 'Kimia',
                'semester' => 2,
                'guru_id' => 3
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        foreach ($mapels as $mapel) {
            Mapel::create($mapel);
        }

    }
}
