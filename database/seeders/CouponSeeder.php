<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('coupons')->truncate();
        for ($i = 0; $i <= 5; $i++) {
            Coupon::create([
                'coupon'=>fake()->postcode(),
                'discount'=> fake()->randomElement([250,500]),
                'used_coupon'=>fake()->randomElement([1,10]),
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
