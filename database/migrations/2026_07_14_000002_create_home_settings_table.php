<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('Orang Muda Katolik');
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();
            $table->text('welcome_message')->nullable();
            $table->string('welcome_title')->nullable();
            $table->string('welcome_name')->nullable();
            $table->string('welcome_photo')->nullable();
            $table->integer('statistic_member')->default(0);
            $table->integer('statistic_activity')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
