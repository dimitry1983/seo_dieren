<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNavigationsSlugUniquePerSite extends Migration
{
    public function up()
    {
        Schema::table('navigations', function (Blueprint $table) {
            // Drop existing unique index on slug
            $table->dropUnique(['slug']);

            // Add composite unique index on slug and site_id
            $table->unique(['slug', 'site_id'], 'navigations_slug_site_id_unique');
        });
    }

    public function down()
    {
        Schema::table('navigations', function (Blueprint $table) {
            // Drop composite index
            $table->dropUnique('navigations_slug_site_id_unique');

            // Re-add the original unique index on slug
            $table->unique('slug');
        });
    }
}