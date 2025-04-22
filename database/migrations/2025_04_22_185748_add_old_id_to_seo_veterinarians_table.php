<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOldIdToSeoVeterinariansTable extends Migration
{
    public function up(): void
    {
        Schema::table('seo_veterinarians', function (Blueprint $table) {
            $table->unsignedBigInteger('old_id')->nullable()->after('id')->index();
        });
    }

    public function down(): void
    {
        Schema::table('seo_veterinarians', function (Blueprint $table) {
            $table->dropColumn('old_id');
        });
    }
}