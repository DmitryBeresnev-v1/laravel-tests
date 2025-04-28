<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateEverything extends Command
{
    /**
     * Название и сигнатура команды.
     *
     * @var string
     */
    protected $signature = 'generate:everything';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Проверяет и создает недостающие миграции, применяет миграции, создает сидеры и контроллеры для каждой миграции';

    /**
     * Выполнение команды.
     *
     * @return void
     */
    public function handle()
    {
        // 1. Применение миграций
        $this->info('Running migrations...');
        $this->call('migrate');

        // 2. Запуск seeders для каждой миграции
        $this->info('Seeding migrations...');
        $migrationFiles = File::files(database_path('migrations'));
        $migrationFiles = array_map(function ($file) {
            return basename($file, '.php');
        }, $migrationFiles);

        foreach ($migrationFiles as $migration) {
            $seederName = $this->getSeederNameFromMigration($migration);
            if (class_exists($seederName)) {
                $this->call('db:seed', ['--class' => $seederName]);
            }
        }

        // 3. Создание контроллеров для каждой миграции
        $this->info('Creating controllers...');
        foreach ($migrationFiles as $migration) {
            $controllerName = $this->getControllerNameFromMigration($migration);
            $this->call('make:controller', ['name' => $controllerName]);
        }
    }

    // Получить список всех миграций (это можно расширить или заменить на реальный список миграций)
    private function getAllMigrationFiles()
    {
        return [
            'create_users_table',
            'create_cashe_table',
            'create_jobs_table',
            'create_subjects_table',
            'create_classes_table',
            'create_topics_table',
            'create_tests_table',
            'create_questions_table',
            'create_answers_table',
        ];
    }

    // Преобразовать имя миграции в имя Seeder
    private function getSeederNameFromMigration($migration)
    {
        // Преобразуем имя миграции в имя сидера
        return ucfirst(camel_case(str_replace('create_', '', str_replace('_table', '', $migration)))) . 'TableSeeder';
    }

    // Преобразовать имя миграции в имя Controller
    private function getControllerNameFromMigration($migration)
    {
        // Преобразуем имя миграции в имя контроллера
        return ucfirst(camel_case(str_replace('create_', '', str_replace('_table', '', $migration)))) . 'Controller';
    }
}
