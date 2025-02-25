<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('thumb'); // assuming thumb is a string URL or file path
            $table->string('name');
            $table->string('excerpt');
            $table->text('description');
            $table->foreignId('veterinarian_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // creates created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
