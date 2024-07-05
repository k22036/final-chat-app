<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roomsManager', function (Blueprint $table) {
            $table->id('id');
            $table->text('room_id');
            $table->timestamp('last_updated')->useCurrent();
            $table->string('name1');
            $table->string('name2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
