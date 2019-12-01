<?php

use Illuminate\Database\Seeder;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0');  
        DB::table('scores')->truncate();

        //  insert mock scores  
        DB::table('scores')->insert(array(
            array(
                'user_id' => 4,
                'score' => 80.25,
                'class_id' => 1
            ),
            array(
                'user_id' => 12,
                'score' => 10.00,
                'class_id' => 1
            ),
            array(
                'user_id' => 5,
                'score' => 75.50,
                'class_id' => 1
            ),
            array(
                'user_id' => 6,
                'score' => 98.00,
                'class_id' => 1
            ),
            array(
                'user_id' => 7,
                'score' => 75.30,
                'class_id' => 1
            ),
            array(
                'user_id' => 8,
                'score' => 50.25,
                'class_id' => 1
            ),
            array(
                'user_id' => 9,
                'score' => 65.75,
                'class_id' => 1
            ),
            array(
                'user_id' => 10,
                'score' => 32.50,
                'class_id' => 1
            ),
            array(
                'user_id' => 11,
                'score' => 40.00,
                'class_id' => 1
            ),
            array(
                'user_id' => 12,
                'score' => 20.50,
                'class_id' => 1
            ),
            array(
                'user_id' => 13,
                'score' => 66.75,
                'class_id' => 1
            ),
            array(
                'user_id' => 4,
                'score' => 70.00,
                'class_id' => 1
            ),
            array(
                'user_id' => 5,
                'score' => 100.00,
                'class_id' => 1
            ),
            array(
                'user_id' => 6,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 7,
                'score' => 50.00,
                'class_id' => 1
            ),
            array(
                'user_id' => 8,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 4,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 7,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 9,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 10,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 11,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 4,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 5,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 6,
                'score' => 0,
                'class_id' => 1
            ),
            array(
                'user_id' => 5,
                'score' => 50.65,
                'class_id' => 1
            ),
            array(
                'user_id' => 4,
                'score' => 60.25,
                'class_id' => 1
            ),
            array(
                'user_id' => 4,
                'score' => 10,
                'class_id' => 1
            ),
            array(
                'user_id' => 4,
                'score' => 0,
                'class_id' => 1
            )
        ));
    }
}
