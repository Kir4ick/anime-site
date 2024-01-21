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
        Schema::create('articles_multfilms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('poster');
            $table->string('created'); # Поле для обозначения когда был прокат мультика
            $table->json('story')->default(null);
            $table->string('story_image')->default('');
            $table->string('history_created')->default('');
            $table->json('history_created_image')->default(null);
            $table->json('images')->default(null);
            $table->foreignIdFor(\App\Models\User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles_multfilms');
    }
};
