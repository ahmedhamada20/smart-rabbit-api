<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        for ($i = 0; $i <= 10; $i++) {
            Product::create([
                'name' => fake()->name(),
                'price' => fake()->randomElement([100, 600]),
                'photo' => fake()->imageUrl(),
                'notes' => fake()->paragraph(),
                'quantity' => fake()->randomElement([10, 20]),
//                'weight' => fake()->randomElement([10, 20]),
                'status' => fake()->randomElement(['active', 'inactive']),
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
