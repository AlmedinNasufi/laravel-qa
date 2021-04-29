<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
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
//         \App\Models\User::factory(10)->create();
//        \App\Models\User::factory(3)->create()->each(function ($the_user){
//            $the_user->questions()->saveMany(factory(\App\Models\Question::class, rand(1, 5))->make()
//            );
//        });
        $user = User::factory(3)->has(Question::factory(3)->count(3))->create();
    }
}
