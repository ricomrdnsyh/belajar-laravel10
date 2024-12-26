<?php

namespace Database\Seeders;

use App\Models\Multimedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=496; $i < 9300; $i++) {
            Multimedia::create([
                'image'              => 'Gambar '.$i,
                'nama'              => 'User Ke- '.$i,
                'jenis_kelamin'     => 'User '.$i,
                'jabatan'           => 'User '.$i,
                'alamat'           => 'User '.$i,
            ]);
        }
    }
}
