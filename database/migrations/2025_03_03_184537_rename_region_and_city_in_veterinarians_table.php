<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('veterinarians', function (Blueprint $table) {
            $table->renameColumn('region', 'region_id');
            $table->renameColumn('city', 'city_id');
        });
    }

    public function down(): void
    {
        Schema::table('veterinarians', function (Blueprint $table) {
            $table->renameColumn('region_id', 'region');
            $table->renameColumn('city_id', 'city');
        });
    }
};