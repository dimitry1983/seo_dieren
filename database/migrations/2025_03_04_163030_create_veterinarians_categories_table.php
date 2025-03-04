<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinariansCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinarians_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('veterinarian_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Add foreign key constraints if applicable
            $table->foreign('veterinarian_id')->references('id')->on('veterinarians')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veterinarians_categories');
    }
}