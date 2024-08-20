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
        /* Schema::table('reviews', function (Blueprint $table) {
            // Drop the correct foreign key
            $table->dropForeign(['customer_id']); // or use $table->dropForeign('reviews_product_id_foreign') if you have the exact name
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Add the foreign key back in case of rollback
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
};
