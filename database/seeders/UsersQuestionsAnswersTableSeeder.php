<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();
        \DB::table('users')->delete();

        $user = User::factory(3)
            ->has(Question::factory(3)->count(3)
                ->has(Answer::factory(rand(1,5))->count(rand(1,5)))
            )->create();
    }
}
