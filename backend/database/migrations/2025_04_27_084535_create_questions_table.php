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
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('test_id')->constrained()->onDelete('cascade'); // Связь с таблицей tests
            $table->text('question'); // Текст вопроса
            $table->enum('type', ['single', 'multiple', 'text']); // Тип вопроса: один правильный, несколько правильных, текстовый
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
