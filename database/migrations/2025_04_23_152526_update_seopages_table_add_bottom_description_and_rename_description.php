<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('seopages', function (Blueprint $table) {
            $table->renameColumn('description', 'top_description');
            $table->longText('bottom_description')->nullable()->after('top_description');
        });
    }

    public function down(): void
    {
        Schema::table('seopages', function (Blueprint $table) {
            $table->renameColumn('top_description', 'description');
            $table->dropColumn('bottom_description');
        });
    }
};