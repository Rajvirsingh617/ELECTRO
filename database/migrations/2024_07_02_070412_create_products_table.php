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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('sku')->unique()->nullable();
            $table->string('product_name')->nullable();
            $table->text('product_desc')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('mrp')->nullable();
            $table->string('sell_price')->nullable();
            $table->string('qty_available')->nullable();
            $table->string('prod_thumbnail_img')->nullable();
            $table->string('prod_main_img')->nullable();
            $table->text('prod_gallery_imgs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
