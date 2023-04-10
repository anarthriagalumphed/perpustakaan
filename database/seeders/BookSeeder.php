<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'book_code' => '1',
            'title' => 'bumi',
            'writer' => 'galih',
            'publisher' => 'galihmahendrasejahtera',
            'publication_year' => '2023/07/22',
            'number_of_pages' => '6666',
            'summary' => 'pokoknya bagus banget deh'

        ]);
    }
}




