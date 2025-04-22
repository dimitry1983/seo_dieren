<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->unsignedBigInteger('site_id')->after('id'); // or after any other column
            $table->index('site_id');

            // Optional: add foreign key constraint
            // $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('provinces', function (Blueprint $table) {
            // Drop foreign key first if added
            // $table->dropForeign(['site_id']);

            $table->dropIndex(['site_id']);
            $table->dropColumn('site_id');
        });
    }
};