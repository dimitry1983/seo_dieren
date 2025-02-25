<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinariansImagesTable extends Migration
{
    public function up()
    {
        Schema::create('veterinarians_images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('featured')->default(false);
            $table->foreignId('veterinarian_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veterinarians_images');
    }
}