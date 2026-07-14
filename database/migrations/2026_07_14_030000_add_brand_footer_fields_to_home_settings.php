<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('brand_name')->default('OMK Paroki');
            $table->string('brand_logo')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('footer_copyright')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn(['brand_name', 'brand_logo', 'footer_description', 'footer_copyright']);
        });
    }
};
