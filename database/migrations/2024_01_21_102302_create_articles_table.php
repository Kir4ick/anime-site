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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('poster');
            $table->string('created'); # Поле для обозначения когда был прокат мультика

            $table->string('image_first')->default('');
            $table->string('image_second')->default('');
            $table->text('description');
            $table->string('quote')->default('');

            # Сюжет
            $table->text('story');
            $table->string('image_story')->default('');

            # Эскиз и кадр
            $table->string('sketch')->default('');
            $table->string('shot')->default('');

            $table->text('history_created');
            $table->json('gallery');

            $table->foreignIdFor(\App\Models\User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
