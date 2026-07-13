<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('history')->nullable();
            $table->text('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('goals')->nullable();
            $table->string('logo')->nullable();
            $table->text('logo_meaning')->nullable();
            $table->string('pastor_name')->nullable();
            $table->string('pastor_photo')->nullable();
            $table->text('pastor_bio')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
