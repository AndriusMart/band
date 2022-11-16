<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as F;
use Carbon\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role'=> 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role'=> 10,
        ]);
        $faker = F::create('lt_LT');
        foreach (['Kenabi-nn', 'Dominos', 'CanCan', 'bagSS'] as $title) {
            DB::table('restaurants')->insert([
                'title' => $title,
                'city' => $faker->city(),
                'address' => $faker->address(),
                'time' => rand(0, 24),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }
        $title = ['MB', 'Volvo', 'Scania', 'Kamaz', 'Avia', 'DAF', 'Iveco', 'MAN', 'Ford', 'Mack', 'Tesla'];


        foreach(range(1,50) as $_){
            DB::table('dishes')->insert([
                'title' => $title[rand(0, count($title)-1)],
                'price' => rand(100, 1000) / 100,
                'restaurant_id' => rand(1, 4),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }

    }
}
