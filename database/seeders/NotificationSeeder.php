<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('notifications')->truncate();
        for ($i = 0; $i <= 5; $i++) {
            Notification::create([
                'user_id'=>User::first()->id,
                'messages'=> fake()->paragraph(),
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
