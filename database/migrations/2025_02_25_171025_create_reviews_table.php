<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // reviewer's name (or review title)
            $table->integer('rating'); // adjust type if needed (e.g., tinyInteger for stars)
            // Note: Duplicate "name" removed. If a second name is required, rename it (e.g., reviewer_name)
            $table->string('city');
            $table->foreignId('veterinarian_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}