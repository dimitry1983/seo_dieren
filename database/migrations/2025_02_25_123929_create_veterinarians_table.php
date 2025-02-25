<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinariansTable extends Migration
{
    public function up()
    {
        Schema::create('veterinarians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('street_nr')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lon', 10, 7)->nullable();
            // Assuming the default admin has an ID of 1:
            $table->unsignedBigInteger('user_id')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veterinarians');
    }
}