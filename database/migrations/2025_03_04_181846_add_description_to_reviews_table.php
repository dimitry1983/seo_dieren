<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Adding a text column 'description' that is nullable
            $table->text('description')->after('name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Dropping the 'description' column if rolling back the migration
            $table->dropColumn('description');
        });
    }
}