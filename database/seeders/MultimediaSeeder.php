<?php

namespace Database\Seeders;

use App\Models\Multimedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MultimediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Multimedia::create([
            'image'             => '',
            'nama'              => 'Rico Mardiansyah',
            'jenis_kelamin'     => 'Laki-laki',
            'jabatan'           => 'Ketua',
            'alamat '           => 'Paiton',
        ]);
    }
}
