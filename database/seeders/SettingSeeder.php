<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('settings')->truncate();
        Setting::create([
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'terms' => fake()->paragraph(),
            'photo' => fake()->imageUrl(),
            'notes' => fake()->paragraph(),
            'notes1' => fake()->paragraph(),
            'notes2' => fake()->paragraph(),
            'notes3' => fake()->paragraph(),
            'notes4' => fake()->paragraph(),
            'notes5' => fake()->paragraph(),
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
