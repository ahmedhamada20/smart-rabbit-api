<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('payment_types')->truncate();
        for ($i = 0; $i <= 5; $i++) {
            PaymentType::create([
                'name' => fake()->name(),
                'notes' => fake()->paragraph(),
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
