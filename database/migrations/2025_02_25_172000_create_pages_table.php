<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('excerpt');
            $table->text('blocks')->nullable(); // Use json() if storing valid JSON
            $table->string('slug')->unique();
            $table->boolean('no_index')->default(false);
            $table->timestamps();         // creates created_at and updated_at columns
            $table->softDeletes();        // creates deleted_at column for soft deletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}