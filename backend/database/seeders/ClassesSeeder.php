<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Заполнить таблицу данными.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'class_number' => '1',
                'name' => 'Класс 1',
            ],
            [
                'class_number' => '2',
                'name' => 'Класс 2',
            ],
            [
                'class_number' => '3',
                'name' => 'Класс 3',
            ],
            [
                'class_number' => '4',
                'name' => 'Класс 4',
            ],
            [
                'class_number' => '5',
                'name' => 'Класс 5',
            ],
            [
                'class_number' => '6',
                'name' => 'Класс 6',
            ],
            [
                'class_number' => '7',
                'name' => 'Класс 7',
            ],
            [
                'class_number' => '8',
                'name' => 'Класс 8',
            ],
            [
                'class_number' => '9',
                'name' => 'Класс 9',
            ],
            [
                'class_number' => '10',
                'name' => 'Класс 10',
            ],
            [
                'class_number' => '11',
                'name' => 'Класс 11',
            ]

        ]);
    }
}
