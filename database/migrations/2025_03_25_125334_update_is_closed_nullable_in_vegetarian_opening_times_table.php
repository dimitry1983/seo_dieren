<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vegetarian_opening_times', function (Blueprint $table) {
            $table->boolean('is_closed')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('vegetarian_opening_times', function (Blueprint $table) {
            $table->boolean('is_closed')->nullable(false)->change();
        });
    }
};
