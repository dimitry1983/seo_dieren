<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location');
            $table->text('content')->nullable();
            $table->timestamps(); // adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('navigations');
    }
}
