<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=>'Bibek Thapa Magar',
            'email'=>'bibekthapamagar@tng.com',
            'password'=>Hash::make('12345678'),
        ]);
        // for($j=1;$j<=5;$j++){
        //     User::create([
        //         'name'=>fake()->name(),
        //         'email'=>fake()->unique()->email(),
        //         'password'=>Hash::make('12345678'),
        //     ]);
        // }
        // for($i=20;$i<=100;$i++){
        //     Event::create([
        //         'name'=>'Name '.$i,
        //         'title'=>'Title '.$i,
        //         'created_by'=>random_int(1,5),
        //     ]);
        // }
    }
}
