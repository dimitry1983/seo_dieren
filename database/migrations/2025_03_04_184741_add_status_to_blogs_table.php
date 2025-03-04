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
        Schema::table('blogs', function (Blueprint $table) {
            // Add the status column after the description column
            $table->string('status')->after('description'); // You can adjust the column type as needed
        });
    }
    
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Drop the status column if rolled back
            $table->dropColumn('status');
        });
    }
};
