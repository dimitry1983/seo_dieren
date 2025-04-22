<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiteIdToNavigationsTable extends Migration
{
    public function up()
    {
        Schema::table('navigations', function (Blueprint $table) {
            // Add site_id column
            $table->unsignedBigInteger('site_id')->after('id');  // Adjust position if needed

            // Add index to site_id
            $table->index('site_id');
        });
    }

    public function down()
    {
        Schema::table('navigations', function (Blueprint $table) {
            // Drop the site_id column and index
            $table->dropIndex(['site_id']);
            $table->dropColumn('site_id');
        });
    }
}
