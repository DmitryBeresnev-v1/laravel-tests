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
                'name' => 'Информатика',
                'url_name' => 'computer-science',
                'description' => 'Изучение компьютеров и программирования',
                'color' => 'blue',
                'icon_subject' => 'fas fa-laptop-code',
            ],
            [
                'name' => 'Математика',
                'url_name' => 'math',
                'description' => 'Царица всех наук',
                'color' => 'green',
                'icon_subject' => 'fas fa-square-root-alt',
            ],
            [
                'name' => 'Биология',
                'url_name' => 'biology',
                'description' => 'Наука о живой природе',
                'color' => 'red',
                'icon_subject' => 'fas fa-dna',
            ],
            [
                'name' => 'Английский язык',
                'url_name' => 'english',
                'description' => 'Международный язык общения',
                'color' => 'yellow',
                'icon_subject' => 'fas fa-language',
            ],
            [
                'name' => 'Физика',
                'url_name' => 'physics',
                'description' => 'Наука о природе и её законах',
                'color' => 'purple',
                'icon-subject' => 'fas fa-atom',
            ],
         ]);
    }
}
