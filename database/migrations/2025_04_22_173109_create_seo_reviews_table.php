<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoReviewsTable extends Migration
{
    public function up(): void
    {
        Schema::create('seo_reviews', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->string('type')->nullable();
            $table->foreignId('parent_id')->nullable()->index();
            $table->string('name');
            $table->text('description');
            $table->integer('rating');
            $table->string('city');
            $table->foreignId('veterinarian_id')->index();

            $table->foreignId('site_id')->index(); // link to sites table

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_reviews');
    }
}
