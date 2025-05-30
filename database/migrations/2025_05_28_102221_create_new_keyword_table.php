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
        Schema::create('new_keyword', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto_increment
            $table->unsignedBigInteger('new_id')->index(); // Index
            $table->unsignedBigInteger('keyword_id')->index(); // Index
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('new_keyword');
    }
};
