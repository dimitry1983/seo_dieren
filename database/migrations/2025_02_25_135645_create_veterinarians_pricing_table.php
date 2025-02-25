<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinariansPricingTable extends Migration
{
    public function up()
    {
        Schema::create('veterinarians_pricing', function (Blueprint $table) {
            $table->id();
            $table->decimal('consult_price', 8, 2);
            $table->foreignId('veterinarian_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veterinarians_pricing');
    }
}