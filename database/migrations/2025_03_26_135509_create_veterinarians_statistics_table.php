<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('veterinarians_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veterinarian_id');
            $table->integer('views')->default(0);
            $table->timestamps();

            $table->foreign('veterinarian_id')->references('id')->on('veterinarians')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('veterinarians_statistics');
    }
};