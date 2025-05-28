<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto_increment

            $table->string('name');
            $table->string('email')->unique(); // varchar(255) + index
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
            $table->rememberToken(); // varchar(100) nullable

            $table->timestamps(); // created_at + updated_at

            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('google_id')->nullable();
            $table->string('token')->nullable();
            $table->string('avatar')->nullable();

            $table->integer('role_id')->default(2)->comment('1: admin, 2: user'); 
            $table->boolean('is_active')->default(1); // tinyint(1) default 1
            $table->integer('fb_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
