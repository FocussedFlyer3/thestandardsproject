<?php

use Illuminate\Database\Seeder;

class ScoreRecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');  
        DB::table('score_record')->truncate();

        // records of students progress for modules
        DB::table('score_record')->insert(array(
            array('score_id' => 12, 'record_id' => 1),
            array('score_id' => 13, 'record_id' => 2),
            array('score_id' => 15, 'record_id' => 3)
        ));
    }
}
