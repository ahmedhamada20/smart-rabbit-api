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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',['admin','driver','client']);
            $table->enum('status',['active','inactive']);
            $table->string('phone');
            $table->string('phone_tow')->nullable()->comment('رقم الهاتف بديل');
            $table->string('name_work')->nullable()->comment('اسم العمل');
            $table->string('postal_code')->nullable()->comment('الرمز البريدي');
            $table->string('governorate')->nullable()->comment('المحافظه');
            $table->string('city')->nullable()->comment('المدينة');
            $table->string('district')->nullable()->comment('الحي');
            $table->string('street_name')->nullable()->comment('اسم الشارع');
            $table->enum('type_user',['male','female']);
            $table->text('photo_person')->nullable()->comment('صوره الهويه');
            $table->text('photo_driving')->nullable()->comment('صوره الهويه');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
