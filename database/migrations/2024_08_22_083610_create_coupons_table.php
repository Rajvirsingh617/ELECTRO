<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->unique();
            $table->integer('coupon_value');
            $table->enum('coupon_type', ['percentage', 'fixed']);
            $table->timestamp('expire_start_date')->nullable();
            $table->timestamp('expire_end_date')->nullable();
            $table->integer('usage_limit')->default(1);
            $table->integer('used_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
