<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('offers')->nullable();       // Mảng các dòng khuyến mãi
            $table->json('commitments')->nullable();  // Mảng các dòng cam kết
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};

