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
        DB::table('users')->truncate();

        //  insert mock scores  
        DB::table('scores')->insert(array(
            array(
                'student_id' => 4,
                'score' => 80.25,
                'class_id' => 1
            ),
            array(
                'student_id' => 5,
                'score' => 75.50,
                'class_id' => 1
            ),
            array(
                'student_id' => 6,
                'score' => 98.00,
                'class_id' => 1
            ),
            array(
                'student_id' => 7,
                'score' => 75.30,
                'class_id' => 1
            ),
            array(
                'student_id' => 8,
                'score' => 50.25,
                'class_id' => 1
            ),
            array(
                'student_id' => 9,
                'score' => 65.75,
                'class_id' => 1
            ),
            array(
                'student_id' => 10,
                'score' => 32.50,
                'class_id' => 1
            ),
            array(
                'student_id' => 11,
                'score' => 40.00,
                'class_id' => 1
            ),
            array(
                'student_id' => 12,
                'score' => 20.50,
                'class_id' => 1
            ),
            array(
                'student_id' => 13,
                'score' => 66.75,
                'class_id' => 1
            )
        ));
    }
}
