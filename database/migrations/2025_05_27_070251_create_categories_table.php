<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary, auto_increment
            $table->string('name')->index(); // Index
            $table->string('slug')->index(); // Index
            $table->string('description')->nullable(); // Có thể null
            $table->timestamp('created_at')->nullable(); // Có thể null
            $table->timestamp('updated_at')->nullable(); // Có thể null
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
