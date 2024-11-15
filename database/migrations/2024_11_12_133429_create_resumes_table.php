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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Связь с пользователем
            $table->string('photo')->nullable(); // Фото (URL или путь к файлу изображения)
            $table->string('first_name');  // Имя
            $table->string('last_name');   // Фамилия
            $table->string('position')->nullable(); // Вакансия, на которую претендует кандидат
            $table->string('phone')->nullable(); // Телефон
            $table->string('email')->nullable(); // Email
            $table->string('address')->nullable(); // Адрес
            $table->json('social_links')->nullable(); // Ссылки на соцсети (например, LinkedIn, GitHub)
            $table->text('objective')->nullable(); // Цель
            $table->json('work_experience')->nullable(); // Опыт работы (описание)
            $table->json('education')->nullable(); // Образование (описание)
            $table->foreignId('template_id')->nullable()->constrained('templates')->onDelete('set null'); // Связь с шаблоном
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
