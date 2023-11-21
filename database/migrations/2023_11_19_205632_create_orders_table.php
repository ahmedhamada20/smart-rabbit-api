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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('payment_type_id')->constrained('payment_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('total');
            $table->enum('status',['pending','accepted','waiting','cansel']);
            $table->string('date')->default(\Carbon\Carbon::now()->format('Y-m-d'));
            $table->string('delivery')->nullable()->comment('مدة التوصيل');
            $table->string('price_delivery')->nullable()->comment('تكلفه التوصيل');
            $table->string('price_tax')->nullable()->comment('ضريبه التوصيل');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
