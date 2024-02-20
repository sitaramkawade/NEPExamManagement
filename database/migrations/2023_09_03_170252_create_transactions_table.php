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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('razorpay_order_id');
            $table->string('razorpay_payment_id')->nullable();
            $table->string('razorpay_refund_id')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('razorpay_signature')->nullable();
            $table->decimal('amount', 10, 2)->nullable()->default(0);
            $table->tinyInteger('status')->nullable()->default(0)->comment('0-Nothing ,1-Order Created,2-Authorized ,3-Captured ,4-Refunded ,5-Failed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
