<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesSeoTable extends Migration
{
    public function up(): void
    {
        Schema::create('templates_seo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->unsignedBigInteger('page_id')->nullable()->index();
            $table->string('custom_link', 255)->nullable();
            $table->string('title', 160)->nullable();
            $table->longText('description_top')->nullable();
            $table->longText('description_bottom')->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('templates_seo');
    }
}