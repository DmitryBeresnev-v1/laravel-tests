<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class add_basic_subject extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('subjects')->insert([
            [
                'name' => 'Физика',
                'url_name' => 'physics',
                'description' => 'Наука о мире вокруг нас: о движении, силах, энергии и законах природы',
            ],
            [
                'name' => 'Информатика',
                'url_name' => 'computer-science',
                'description' => 'Наука о компьютерах, данных и том, как создавать программы и решать задачи с их помощью.',
            ],
                        [
                'name' => 'Биология',
                'url_name' => 'biology',
                'description' => 'Наука о живых организмах: от клеток до экосистем.',
            ],
                        [
                'name' => 'Английский язык',
                'url_name' => 'english',
                'description' => 'Предмет, помогающий понимать, читать, писать и говорить на международном языке общения.',
            ],
         ]);
    }
}
