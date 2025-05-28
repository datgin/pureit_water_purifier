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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('image')->nullable()->comment('Ảnh đại diện sản phẩm');
            $table->decimal('price', 12, 2);
            $table->string('slug');
            $table->string('description_short')->nullable();
            $table->text('description')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('keyword_seo')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->enum('discount_type', ['percentage', 'amount'])->default('amount')->comment('Loại giảm giá (% hoặc tiền)');
            $table->decimal('discount_value', 12, 2)->default(0.00)->comment('Giá trị giảm');
            $table->dateTime('discount_start_date')->nullable()->comment('Ngày bắt đầu giảm giá');
            $table->dateTime('discount_end_date')->nullable()->comment('Ngày kết thúc giảm giá');
            $table->timestamps();

            // ràng buộc khóa ngoại
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
