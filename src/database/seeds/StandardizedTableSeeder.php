<?php

use Illuminate\Database\Seeder;

class StandardizedTableSeeder extends Seeder
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
        DB::table('standardized')->truncate();

        //  insert mock scores  
        DB::table('standardized')->insert(array(
            array(
                'score' => 80.25,
                'user_id' => 4
            ),
            array(
                'score' => 20.25,
                'user_id' => 4
            ),
            array(
                'score' => 50.50,
                'user_id' => 4
            ),
            array(
                'score' => 90,
                'user_id' => 4
            ),
            array(
                'score' => 100,
                'user_id' => 4
            ),
            array(
                'score' => 78,
                'user_id' => 4
            ),
            array(
                'score' => 10.00,
                'user_id' => 5
            ),
            array(
                'score' => 20.00,
                'user_id' => 5
            ),
            array(
                'score' => 50.00,
                'user_id' => 5
            ),
            array(
                'score' => 50.00,
                'user_id' => 5
            ),
            array(
                'score' => 80.00,
                'user_id' => 5
            ),
            array(
                'score' => 90.00,
                'user_id' => 6
            ),
            array(
                'score' => 100.00,
                'user_id' => 6
            ),
            array(
                'score' => 20.00,
                'user_id' => 6
            ),
            array(
                'score' => 50.00,
                'user_id' => 6
            ),
            array(
                'score' => 60.00,
                'user_id' => 6
            ),
            array(
                'score' => 70.00,
                'user_id' => 6
            ),
            array(
                'score' => 10.00,
                'user_id' => 7
            ),
            array(
                'score' => 10.00,
                'user_id' => 8
            ),
            array(
                'score' => 10.00,
                'user_id' => 9
            ),
            array(
                'score' => 10.00,
                'user_id' => 10
            )
        ));
    }
}
