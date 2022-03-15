<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('music')->insert([
            'nome' => 'Ghost of navigator',
            'autor' => 'Iron Maiden',
            'link' => 'https://youtube.com/watch?v=CQVCJziKw-E',
            'imagem' => 'example-image-1.jpg',
        ]);
        DB::table('music')->insert([
            'nome' => 'Turn the page',
            'autor' => 'Metallica',
            'link' => 'https://youtube.com/watch?v=qPOTEs_yTJo',
            'imagem' => 'example-image-2.jpg',
        ]);
        DB::table('music')->insert([
            'nome' => 'Ghost of navigator',
            'autor' => 'Iron Maiden',
            'link' => 'https://youtube.com/watch?v=3t2WkCudwfY',
            'imagem' => 'example-image-3.jpg',
        ]);
    }
}
