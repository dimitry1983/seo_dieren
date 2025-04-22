<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePagesSlugUniquePerSite extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            // Drop existing unique index on slug
            $table->dropUnique(['slug']);

            // Add composite unique index on slug and site_id
            $table->unique(['slug', 'site_id'], 'pages_slug_site_id_unique');
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            // Drop composite index
            $table->dropUnique('pages_slug_site_id_unique');

            // Re-add the original unique index on slug
            $table->unique('slug');
        });
    }
}