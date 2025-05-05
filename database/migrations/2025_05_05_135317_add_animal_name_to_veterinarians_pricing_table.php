<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnimalNameToVeterinariansPricingTable extends Migration
{
    public function up()
    {
        Schema::table('veterinarians_pricing', function (Blueprint $table) {
            $table->string('animal_name')->nullable()->after('pricing_group_id');
        });
    }

    public function down()
    {
        Schema::table('veterinarians_pricing', function (Blueprint $table) {
            $table->dropColumn('animal_name');
        });
    }
}
