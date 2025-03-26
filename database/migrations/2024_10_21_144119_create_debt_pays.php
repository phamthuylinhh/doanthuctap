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
        Schema::create('debt_pays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('debt_id')->constrained();
            $table->float('amount');
            $table->dateTime('date_payment');
            $table->enum('payment_method', ['Thanh toán trực tiếp', 'Chuyển khoản trực tiếp'])->default('Thanh toán trực tiếp');
            $table->text('description')->nullable();
            $table->enum('status', ['Chưa duyệt', 'Đã duyệt'])->default('Chưa duyệt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debt_pays');
    }
};
