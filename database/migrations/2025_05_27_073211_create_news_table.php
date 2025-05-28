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
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->string('image');
            $table->string('short_description')->nullable();
            $table->longText('content');
            $table->dateTime('posted_at')->nullable();
            $table->dateTime('remove_at')->nullable();
            $table->string('view_count');
            $table->boolean('status')->default(0); // 0: chưa đăng, 1: đã đăng
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
            $table->softDeletes(); // deleted_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};