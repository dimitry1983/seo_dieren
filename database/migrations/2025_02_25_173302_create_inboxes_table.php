<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thread_id');
            $table->boolean('mute')->default(false);
            $table->string('title');
            $table->text('messages');
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('to_id');
            $table->unsignedBigInteger('sender_id');
            $table->boolean('read_by_sender')->default(false);
            $table->boolean('read_by_receiver')->default(false);
            $table->boolean('deleted_by_receiver')->default(false);
            $table->boolean('deleted_by_sender')->default(false);
            $table->timestamps();      // creates created_at and updated_at columns
            $table->softDeletes();     // creates deleted_at column for soft deletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('inboxes');
    }
}