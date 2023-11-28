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
            $table->string('name');
            $table->string('price');
            $table->string('photo');
            $table->string('notes');
            $table->string('quantity');
//            $table->string('weight')->comment('وزن المنتج');
//            $table->string('type_goods')->comment('نوع البضائع');
            $table->enum('status',['active','inactive']);
            for ($i = 1 ; $i <= 5 ; $i++){
                $table->text('notes'.$i)->nullable();
            }
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
