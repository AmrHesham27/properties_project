<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // A stable key so we can map txt seeders + image folders together (e.g. "1" matches images/1/).
            $table->string('source_key')->nullable()->unique();

            $table->json('image_urls')->nullable();
            $table->string('main_image_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropUnique(['source_key']);
            $table->dropColumn(['source_key', 'image_urls', 'main_image_url']);
        });
    }
};

