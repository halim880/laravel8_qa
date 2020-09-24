<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Question::factory(10)->create();
        \DB::table('users')->delete();
        \DB::table('questions')->delete();   
        \DB::table('answers')->delete();

        User::factory(20)->create()->each(function ($u){
            $u->questions()->saveMany(
                Question::factory(rand(1, 5))->make()
            )
            ->each(function ($q){
                $q->answers()->saveMany(Answer::factory(rand(0, 5))->make());
            });
        });
    }
}
