<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('wallets')->truncate();
        for ($i = 0; $i <= 5; $i++) {
            Wallet::create([
                'user_id' => User::first()->id,
                'price' => fake()->numberBetween([100, 200]),
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
