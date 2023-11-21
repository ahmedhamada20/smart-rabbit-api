<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('favorites')->truncate();
        for ($i = 0; $i <= 5; $i++) {
            Favorite::create([
                'user_id'=>User::first()->id,
                'product_id'=> Product::all()->random()->id,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
