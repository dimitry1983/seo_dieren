<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeopagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('seopages', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->foreignId('parent_page')->nullable()->constrained('seopages'); // Assuming the parent page references another seopage
            $table->string('custom_link')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('slug')->unique();
            $table->boolean('active')->default(true);
            $table->foreignId('site_id')->constrained('sites'); // Assuming the site_id references the sites table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('seopages');
    }
}