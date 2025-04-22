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
        Schema::create('seo_veterinarians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('region_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('street_nr')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->text('location_link')->nullable();
            $table->double('rating')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->string('place_id');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lon', 10, 7)->nullable();
            $table->unsignedBigInteger('user_id')->default(1);
            $table->integer('site_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_veterinarians');
    }
};
