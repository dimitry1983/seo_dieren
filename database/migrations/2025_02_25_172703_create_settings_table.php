<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('option_name');
            $table->text('option_value');
            $table->boolean('autoload')->default(true);
            $table->timestamps(); // adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}