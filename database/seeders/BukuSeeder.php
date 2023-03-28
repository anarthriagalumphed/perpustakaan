<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'judul' => 'bumi',
            'penulis' => 'galih',
            'penerbit' => 'galihmahendrasejahtera',
            'tahun_terbit' => '2023/07/22',
            'jumlah_halaman' => '6666',
            'sinopsis' => 'pokoknya bagus banget deh'

        ]);
    }
}
