<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('veterinarians_pricing', function (Blueprint $table) {
            $table->foreignId('pricing_group_id')->nullable()->constrained('veterinarian_pricing_groups')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('veterinarians_pricing', function (Blueprint $table) {
            $table->dropForeign(['pricing_group_id']);
            $table->dropColumn('pricing_group_id');
        });
    }
};