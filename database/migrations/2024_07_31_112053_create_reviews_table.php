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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // FK -> PK Use unsignedBigInteger for foreign key
            $table->unsignedBigInteger('customer_id'); // FK -> PK Use unsignedBigInteger for foreign key
            $table->string('rating'); // FK -> PK Use unsignedBigInteger for foreign key
            $table->text('reviewContent'); // FK -> PK Use unsignedBigInteger for foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
