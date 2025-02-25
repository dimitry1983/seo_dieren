<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // references users table
            $table->string('email');
            $table->text('details');
            $table->string('status');
            $table->timestamps(); // creates created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('claims');
    }
}