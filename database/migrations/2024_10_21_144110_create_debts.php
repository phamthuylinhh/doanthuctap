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
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->integer('product_id')->nullable();
            $table->float('total_amount');
            $table->float('installment_amount');
            $table->float('amount_paid');
            $table->integer('due_date');
            $table->enum('status_payment', ['Đã hoàn thành', 'Chưa hoàn thành', 'Quá hạn'])->default('Chưa hoàn thành');
            $table->dateTime('date_payment');
            $table->enum('payment_method', ['Chuyển khoản trực tiếp', 'Thanh toán trực tiếp'])->default('Thanh toán trực tiếp');
            $table->dateTime('date_by');
            $table->dateTime('ended_at');
            $table->enum('status', ['Đã duyệt', 'Chưa duyệt'])->default('Chưa duyệt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depts');
    }
};
