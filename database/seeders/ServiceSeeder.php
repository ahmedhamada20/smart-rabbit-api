<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('services')->truncate();
        for ($i = 0; $i <= 10; $i++) {
            Service::create([
                'name' => fake()->name(),
                'price' => fake()->randomElement([100, 600]),
                'photo' => fake()->imageUrl(),
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
