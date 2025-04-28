<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('subject_id')->constrained()->onDelete('cascade'); // Связь с таблицей subjects
            $table->foreignId('class_id')->constrained()->onDelete('cascade'); // Связь с таблицей classes
            $table->string('title'); // Название темы
            $table->longText('description'); // Описание темы (HTML)
            $table->integer('difficulty'); // Сложность темы (например, 1 - 5)
            $table->integer('average_time'); // Среднее время (в минутах)
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Кто создал
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
