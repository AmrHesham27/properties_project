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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('location_name')->nullable();
            $table->string('title');

            $table->unsignedSmallInteger('bedrooms_count')->nullable();
            $table->unsignedSmallInteger('full_bathrooms_count')->nullable();
            $table->string('view')->nullable();

            $table->boolean('pet_friendly')->default(false);

            $table->decimal('rent_amount', 12, 2)->nullable();
            $table->char('rent_currency', 3)->default('GBP');
            $table->string('rent_period')->default('month');

            $table->longText('description')->nullable();
            $table->longText('neighborhood')->nullable();

            $table->json('highlighted_features')->nullable();
            $table->json('amenities')->nullable();
            $table->json('getting_around')->nullable();

            $table->longText('map_iframe_html')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

