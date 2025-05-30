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
        Schema::create('seo_score_new', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_id');
            $table->integer('seo_score')->nullable();
            $table->timestamps();

            $table->index('new_id');
            $table->foreign('new_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo_score_new');
    }
};
