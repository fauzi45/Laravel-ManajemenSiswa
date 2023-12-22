<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
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
                'nama' => 'Deo',
                'telpon' => '08962280274',
                'alamat' => 'Bantul',
            ],
            [
                'nama' => 'Peizi',
                'telpon' => '08762421423',
                'alamat' => 'Medan',
            ],
            [
                'nama' => 'Roy',
                'telpon' => '0875231423',
                'alamat' => 'Ciseeng',
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        foreach ($data as $guru) {
            Guru::create($guru);
        }
    }
}
