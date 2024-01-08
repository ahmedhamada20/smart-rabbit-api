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
        Schema::create('request_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('driver_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('sender_name')->nullable();
            $table->text('sender_phone')->nullable();
            $table->text('sender_address')->nullable();
            $table->enum('time_request',[
                'tomorrow',
                'today',
                'shortest_time',
            ]);
            $table->text('receiver_name')->nullable();
            $table->text('receiver_phone')->nullable();
            $table->text('receiver_address')->nullable();
            $table->text('total_price')->nullable();
            $table->text('order_code')->nullable();
            $table->enum('status',['new','pending','accepted','cansel']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_orders');
    }
};
