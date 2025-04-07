<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('veterinarians', function (Blueprint $table) {
            $table->text('location_link')->nullable()->after('website');
            $table->float('rating')->nullable()->default(0)->after('location_link');
            $table->string('place_id')->after('rating');
        });
    }
    
    public function down()
    {
        Schema::table('veterinarians', function (Blueprint $table) {
            $table->dropColumn(['location_link', 'rating', 'place_id']);
        });
    }
};
