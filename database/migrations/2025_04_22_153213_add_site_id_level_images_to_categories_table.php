<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiteIdLevelImagesToCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Add site_id column
            $table->unsignedBigInteger('site_id')->after('id');  // Adjust position if needed

            // Add level column
            $table->integer('level')->nullable()->after('site_id');  // Adjust position if needed

            // Add images column (assuming it's a string for image paths)
            $table->string('images')->nullable()->after('level');  // Adjust position if needed

            // Add index to site_id
            $table->index('site_id');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Drop the columns and index
            $table->dropIndex(['site_id']);
            $table->dropColumn('site_id');
            $table->dropColumn('level');
            $table->dropColumn('images');
        });
    }
}
