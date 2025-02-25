<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVegetarianOpeningTimesTable extends Migration
{
    public function up()
    {
        Schema::create('vegetarian_opening_times', function (Blueprint $table) {
            $table->id();
            $table->string('day_of_week');
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('veterinarian_id');
            $table->timestamps();

            // Optional: Add a foreign key constraint to the veterinarians table
            $table->foreign('veterinarian_id')
                  ->references('id')
                  ->on('veterinarians')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vegetarian_opening_times');
    }
}