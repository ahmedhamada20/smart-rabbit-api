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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('commission')->nullable();
            $table->text('terms')->nullable()->comment('الشروط والاحكام');
            $table->text('photo')->nullable();
            $table->text('notes')->nullable();
            $table->text('price_tax')->nullable();
            for ($i = 1 ; $i <= 6 ; $i++){
                $table->text('notes_'.$i)->nullable();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
