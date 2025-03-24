<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('veterinarians_images', function (Blueprint $table) {
            $table->boolean('featured')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('veterinarians_images', function (Blueprint $table) {
            $table->boolean('featured')->nullable(false)->change();
        });
    }
};