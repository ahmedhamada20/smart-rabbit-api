<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::create([
            'type' => 'client',
            'status' => 'active',
            'type_user' => 'male',
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'password' => Hash::make(123456789),
        ]);

        User::create([
            'type' => 'driver',
            'status' => 'active',
            'type_user' => 'male',
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'password' => Hash::make(123456789),
        ]);

        $this->call(PaymentTypeSeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(WalletSeeder::class);
    }
}
